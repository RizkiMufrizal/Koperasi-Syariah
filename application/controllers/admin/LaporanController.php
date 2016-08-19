<?php
/**
 * @Author: Rizki Mufrizal <mufrizalrizki@gmail.com>
 * @Date:   2016-08-18 21:50:13
 * @Last Modified by:   RizkiMufrizal
 * @Last Modified time: 2016-08-19 18:53:10
 */
class LaporanController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pembiayaan');
        $this->load->model('PeminjamanInstan');
        $this->load->model('AngsuranPembiayaan');
        $this->load->model('BiayaOperasional');
    }

    public function index()
    {
        $csrf = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash(),
        );
        $this->load->view('admin/LaporanIndexView', $csrf);
    }

    public function laporanBerdasarkanTanggal()
    {
        $tanggal_awal = $this->input->post('tanggal_awal');
        $pisah1       = explode('/', $tanggal_awal);
        $urutan1      = array($pisah1[2], $pisah1[1], $pisah1[0]);
        $satukan1     = implode('-', $urutan1);

        $tanggal_akhir = $this->input->post('tanggal_akhir');
        $pisah2        = explode('/', $tanggal_akhir);
        $urutan2       = array($pisah2[2], $pisah2[1], $pisah2[0]);
        $satukan2      = implode('-', $urutan2);

        $jumlahPendapatan        = 0;
        $jumlahBiayaAdministrasi = 0;
        $jumlahMarginMurobaah    = 0;
        $jumlahMarginIjarah      = 0;
        $jumlahBagiHasilAnggota  = 0;
        $jumlahBagiHasilKoperasi = 0;

        /**
         * ambil data pembiayaan
         * @var [type]
         */
        $pembiayaan = $this->Pembiayaan->ambilPembiayaanBerdasarkanDuaTanggal($satukan1, $satukan2);

        /**
         * proses perhitungan jumlah margin murobaah, ijarah dan biaya administrasi pada tabel peminjaman
         */
        foreach ($pembiayaan as $p) {
            if ($p->jenis_pembiayaan == 'Murobaah') {
                $jumlahMarginMurobaah = $jumlahMarginMurobaah + ($p->pembiayaan * ($p->margin / 100));
            } else if ($p->jenis_pembiayaan == 'Ijarah') {
                $jumlahMarginIjarah = $jumlahMarginIjarah + $p->margin;
            }
            $jumlahBiayaAdministrasi = $jumlahBiayaAdministrasi + $p->biaya_administrasi;
        }

        /**
         * ambil data peminjaman instan
         * @var [type]
         */
        $peminjamanInstan = $this->PeminjamanInstan->ambilPeminjamanInstanBerdasarkanDuaTanggal($satukan1, $satukan2);

        /**
         * proses perhitungan biaya administrasi pada tabel peminjaman instan
         */
        foreach ($peminjamanInstan as $pi) {
            $jumlahBiayaAdministrasi = $jumlahBiayaAdministrasi + $pi->biaya_administrasi;
        }

        /**
         * ambil data angsuran pembiayaan
         * @var [type]
         */
        $angsuranPembiayaan = $this->AngsuranPembiayaan->ambilAngsuranPembiayaanBerdasarkanDuaTanggal($satukan1, $satukan2);

        /**
         * proses perhitungan jumlah bagi hasil koperasi dan anggota pada tabel angsuran pembiayaan
         */
        foreach ($angsuranPembiayaan as $ap) {
            $jumlahBagiHasilAnggota  = $jumlahBagiHasilAnggota + $ap->bagi_hasil_anggota;
            $jumlahBagiHasilKoperasi = $jumlahBagiHasilKoperasi + $ap->bagi_hasil_koperasi;
        }

        /**
         * ambil data biaya operasional
         * @var [type]
         */
        $biayaOperasional = $this->BiayaOperasional->ambilBiayaOperasionalBerdasarkanDuaTanggal($satukan1, $satukan1);

        $jumlahPengeluaran              = 0;
        $jumlahGajiPengelola            = 0;
        $jumlahHonorPengurusDanPengawas = 0;
        $jumlahATK                      = 0;
        $jumlahListrikDanTelepon        = 0;
        $jumlahTransportasi             = 0;
        $jumlahAirMineralDanRumahTangga = 0;
        $jumlahLainlain                 = 0;

        foreach ($biayaOperasional as $bo) {
            if ($bo->jenis_beban == 'Gaji Pengelola') {
                $jumlahGajiPengelola = $jumlahGajiPengelola + $bo->biaya;
            } else if ($bo->jenis_beban == 'Honor Pengurus Dan Pengawas') {
                $jumlahHonorPengurusDanPengawas = $jumlahHonorPengurusDanPengawas + $bo->biaya;
            } else if ($bo->jenis_beban == 'ATK') {
                $jumlahATK = $jumlahATK + $bo->biaya;
            } else if ($bo->jenis_beban == 'Listrik Dan Telepon') {
                $jumlahListrikDanTelepon = $jumlahListrikDanTelepon + $bo->biaya;
            } else if ($bo->jenis_beban == 'Transportasi') {
                $jumlahTransportasi = $jumlahTransportasi + $bo->biaya;
            } else if ($bo->jenis_beban == 'Air Mineral Dan Rumah Tangga') {
                $jumlahAirMineralDanRumahTangga = $jumlahAirMineralDanRumahTangga + $bo->biaya;
            } else if ($bo->jenis_beban == 'Lain - lain') {
                $jumlahLainlain = $jumlahLainlain + $bo->biaya;
            }
        }

        $jumlahPendapatan = $jumlahBiayaAdministrasi + $jumlahMarginMurobaah + $jumlahMarginIjarah + $jumlahBagiHasilAnggota + $jumlahBagiHasilKoperasi;

        $jumlahPengeluaran = $jumlahGajiPengelola + $jumlahHonorPengurusDanPengawas + $jumlahATK + $jumlahListrikDanTelepon + $jumlahTransportasi + $jumlahAirMineralDanRumahTangga + $jumlahLainlain;
    }

}
