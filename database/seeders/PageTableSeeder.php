<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Page;

class PageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Page::turncate();

        Page::create([
                            'category_news_id' => NULL,
            'content' => '<ul style="margin-bottom: 1rem; color: rgb(38, 59, 94); font-family: Quicksand, sans-serif; font-size: 16px;"><li>Usaha mikro, kecil, dan menengah;</li><li>Calon tenaga kerja Indonesia yang akan bekerja di luar negeri;</li><li>Calon pekerja magang di luar negeri;</li><li>Anggota keluarga dari karyawan/karyawati yang berpenghasilan tetap atau bekerja sebagai tenaga kerja indonesia;</li><li>Tenaga kerja Indonesia yang pernah bekerja di luar negeri;</li><li>Pekerja yang terkena pemutusan hubungan kerja;</li><li>Usaha mikro, kecil, dan menengah di wilayah perbatasan dengan negara lain; dan/atau</li><li>Kelompok Usaha seperti Kelompok Usaha Bersama (KUBE), Gabungan Kelompok Tani dan Nelayan ( Gapoktan), dan Kelompok Usaha lainnya.</li></ul>',
                'created_at' => '2021-12-06 01:58:31',
                'id' => '595a48d0-6655-4e6b-982d-1743b6bc414a',
                'img' => NULL,
                'slug' => 'siapa-saja-penerima-kur',
                'title' => 'Siapa saja penerima KUR ?',
                'type' => 'FAQ',
                'updated_at' => '2021-12-06 01:58:31',
        ]);

        Page::create([
                'category_news_id' => NULL,
                'content' => '<ul style="margin-bottom: 1rem; color: rgb(38, 59, 94); font-family: Quicksand, sans-serif; font-size: 16px;"><li>Usaha mikro, kecil, dan menengah;</li><li>Calon tenaga kerja Indonesia yang akan bekerja di luar negeri;</li><li>Calon pekerja magang di luar negeri;</li><li>Anggota keluarga dari karyawan/karyawati yang berpenghasilan tetap atau bekerja sebagai tenaga kerja indonesia;</li><li>Tenaga kerja Indonesia yang pernah bekerja di luar negeri;</li><li>Pekerja yang terkena pemutusan hubungan kerja;</li><li>Usaha mikro, kecil, dan menengah di wilayah perbatasan dengan negara lain; dan/atau</li><li>Kelompok Usaha seperti Kelompok Usaha Bersama (KUBE), Gabungan Kelompok Tani dan Nelayan ( Gapoktan), dan Kelompok Usaha lainnya.</li></ul>',
                'created_at' => '2021-12-06 01:58:31',
                'id' => '595a48d0-6655-4e6b-982d-1743b6bc414a',
                'img' => NULL,
                'slug' => 'siapa-saja-penerima-kur',
                'title' => 'Siapa saja penerima KUR ?',
                'type' => 'TESTIMONIAL',
                'updated_at' => '2021-12-06 01:58:31',
        ]);

        Page::create([
                'category_news_id' => NULL,
                'content' => '<ul style="margin-bottom: 1rem; color: rgb(38, 59, 94); font-family: Quicksand, sans-serif; font-size: 16px;"><li>Usaha mikro, kecil, dan menengah;</li><li>Calon tenaga kerja Indonesia yang akan bekerja di luar negeri;</li><li>Calon pekerja magang di luar negeri;</li><li>Anggota keluarga dari karyawan/karyawati yang berpenghasilan tetap atau bekerja sebagai tenaga kerja indonesia;</li><li>Tenaga kerja Indonesia yang pernah bekerja di luar negeri;</li><li>Pekerja yang terkena pemutusan hubungan kerja;</li><li>Usaha mikro, kecil, dan menengah di wilayah perbatasan dengan negara lain; dan/atau</li><li>Kelompok Usaha seperti Kelompok Usaha Bersama (KUBE), Gabungan Kelompok Tani dan Nelayan ( Gapoktan), dan Kelompok Usaha lainnya.</li></ul>',
                'created_at' => '2021-12-06 01:58:31',
                'id' => '595a48d0-6655-4e6b-982d-1743b6bc414a',
                'img' => NULL,
                'slug' => 'siapa-saja-penerima-kur',
                'title' => 'Siapa saja penerima KUR DATA KEDUA ?',
                'type' => 'TESTIMONIAL',
                'updated_at' => '2021-12-06 01:58:31',
        ]);

        Page::create([
                'category_news_id' => NULL,
                'content' => '<ul style="margin-bottom: 1rem; color: rgb(38, 59, 94); font-family: Quicksand, sans-serif; font-size: 16px;"><li>Usaha mikro, kecil, dan menengah;</li><li>Calon tenaga kerja Indonesia yang akan bekerja di luar negeri;</li><li>Calon pekerja magang di luar negeri;</li><li>Anggota keluarga dari karyawan/karyawati yang berpenghasilan tetap atau bekerja sebagai tenaga kerja indonesia;</li><li>Tenaga kerja Indonesia yang pernah bekerja di luar negeri;</li><li>Pekerja yang terkena pemutusan hubungan kerja;</li><li>Usaha mikro, kecil, dan menengah di wilayah perbatasan dengan negara lain; dan/atau</li><li>Kelompok Usaha seperti Kelompok Usaha Bersama (KUBE), Gabungan Kelompok Tani dan Nelayan ( Gapoktan), dan Kelompok Usaha lainnya.</li></ul>',
                'created_at' => '2021-12-06 01:58:31',
                'id' => '595a48d0-6655-4e6b-982d-1743b6bc414a',
                'img' => NULL,
                'slug' => 'siapa-saja-penerima-kur',
                'title' => 'Siapa saja penerima KUR DATA KEDUA ? data ke 3 ',
                'type' => 'TESTIMONIAL',
                'updated_at' => '2021-12-06 01:58:31',
        ]);




//         \DB::table('pages')->delete();

//         \DB::table('pages')->insert(array (
//             0 =>
//             array (
//                 'category_news_id' => NULL,
//             'content' => '<ul style="margin-bottom: 1rem; color: rgb(38, 59, 94); font-family: Quicksand, sans-serif; font-size: 16px;"><li>Usaha mikro, kecil, dan menengah;</li><li>Calon tenaga kerja Indonesia yang akan bekerja di luar negeri;</li><li>Calon pekerja magang di luar negeri;</li><li>Anggota keluarga dari karyawan/karyawati yang berpenghasilan tetap atau bekerja sebagai tenaga kerja indonesia;</li><li>Tenaga kerja Indonesia yang pernah bekerja di luar negeri;</li><li>Pekerja yang terkena pemutusan hubungan kerja;</li><li>Usaha mikro, kecil, dan menengah di wilayah perbatasan dengan negara lain; dan/atau</li><li>Kelompok Usaha seperti Kelompok Usaha Bersama (KUBE), Gabungan Kelompok Tani dan Nelayan ( Gapoktan), dan Kelompok Usaha lainnya.</li></ul>',
//                 'created_at' => '2021-12-06 01:58:31',
//                 'id' => '595a48d0-6655-4e6b-982d-1743b6bc414a',
//                 'img' => NULL,
//                 'slug' => 'siapa-saja-penerima-kur',
//                 'title' => 'Siapa saja penerima KUR ?',
//                 'type' => 'FAQ',
//                 'updated_at' => '2021-12-06 01:58:31',
//             ),
//             1 =>
//             array (
//                 'category_news_id' => NULL,
//             'content' => '<ul style="margin-bottom: 1rem; color: rgb(38, 59, 94); font-family: Quicksand, sans-serif; font-size: 16px;"><li>Terdiri atas seluruh anggota yang memiliki usaha produktif dan layak, dan/atau diperbolehkan beberapa anggota merupakan pelaku usaha pemula;</li><li>Dalam hal anggota Kelompok Usaha terdapat pelaku usaha pemula maka harus memiliki surat rekomendasi pengajuan kredit/pembiayaan dari Ketua Kelompok Usaha;</li><li>Kegiatan Usaha dapat dilakukan secara mandiri dan/atau bekerja sama dengan mitra usaha;</li><li>Kegiatan Kelompok usaha dilaksanakan untuk meningkatkan dan mengembangkan usaha anggotanya;</li><li>Kelompok Usaha telah memilki surat keterangan Kelompok Usaha yang diterbitkan oleh dinas/ instansi terkait dan/atau surat keterangan lainnya;</li><li>Pengajuan permohonan kredit/pembiayaan dilakukan oleh Kelompok Usaha melalui ketua Kelompok Usaha dengan jumlah pengajuan berdasarkan plafon kredit/pembiayaan yang diajukan oleh masing-masing anggota Kelompok Usaha;</li><li>Perjanjian kredit/pembiayaan untuk Kelompok Usaha dilakukan oleh masing-masing individu anggota Kelompok Usaha dengan Penyalur KUR;</li><li>Dalam hal hasil penilaian Penyalur atas pengajuan kredit/pembiayaan yang dilakukan oleh Kelompok Usaha membutuhkan agunan tambahan maka Kelompok Usaha dapat memberikan agunan tambahan kolektif yang bersumber dari aset Kelompok Usaha itu sendiri atau aset dari sebagian anggota Kelompok Usaha yang dapat dipertanggungjawabkan melalui mekanisme tanggung renteng;</li><li>Dalam hal terdapat kegagalan pembayaran angsuran kredit/pembiayaan maka ketua Kelompok Usaha mengkoordinir pelaksanaan mekanisme tanggung renteng antar anggota Kelompok Usaha.</li></ul>',
//                 'created_at' => '2021-12-06 01:59:31',
//                 'id' => '1f668a65-5117-4cbb-a848-9a3b54101a17',
//                 'img' => NULL,
//                 'slug' => 'pertanyaan-bagaimana-kriteria-usaha-yang-layak-untuk-mengikuti-program-kredit-usaha-rakyat',
//                 'title' => 'Pertanyaan : Bagaimana kriteria usaha yang layak untuk mengikuti program Kredit Usaha Rakyat ?',
//                 'type' => 'FAQ',
//                 'updated_at' => '2021-12-06 01:59:31',
//             ),
//             2 =>
//             array (
//                 'category_news_id' => NULL,
//             'content' => '<p style="margin-bottom: 1rem; color: rgb(38, 59, 94); font-family: Quicksand, sans-serif; font-size: 16px;">Agunan KUR terdiri atas :</p><ol style="margin-bottom: 1rem; color: rgb(38, 59, 94); font-family: Quicksand, sans-serif; font-size: 16px; list-style-type: lower-alpha;"><li>Agunan pokok, dan</li><li>Agunan Tambahan</li></ol><p style="margin-bottom: 1rem; color: rgb(38, 59, 94); font-family: Quicksand, sans-serif; font-size: 16px;">Agunan Pokok merupakan usaha atau obyek yang dibiayai oleh KUR.</p><p style="margin-bottom: 1rem; color: rgb(38, 59, 94); font-family: Quicksand, sans-serif; font-size: 16px;">Sedangakan Agunan Tambahan untuk :</p><ol style="margin-bottom: 1rem; color: rgb(38, 59, 94); font-family: Quicksand, sans-serif; font-size: 16px; list-style-type: lower-alpha;"><li>KUR mikro dan KUR penempatan tenaga kerja Indonesia tidak diwajibkan dan tanpa perikatan; dan</li><li>KUR kecil dan KUR khusus sesuai dengan kebijakan/ penilaian penyalur KUR.</li></ol>',
//                 'created_at' => '2021-12-06 01:59:54',
//                 'id' => '88608825-4ef4-4131-b59a-cd62ed69c222',
//                 'img' => NULL,
//                 'slug' => 'pertanyaan-apa-saja-agunan-pokok-kur',
//                 'title' => 'Pertanyaan : Apa saja agunan pokok KUR ?',
//                 'type' => 'FAQ',
//                 'updated_at' => '2021-12-06 02:05:57',
//             ),
//             3 =>
//             array (
//                 'category_news_id' => NULL,
//             'content' => '<p style="margin-bottom: 1rem; color: rgb(38, 59, 94); font-family: Quicksand, sans-serif; font-size: 16px;">Jangka waktu KUR Mikro :</p><ol style="margin-bottom: 1rem; color: rgb(38, 59, 94); font-family: Quicksand, sans-serif; font-size: 16px; list-style-type: lower-alpha;"><li>paling lama 3 (tiga) tahun untuk kredit/pembiayaan modal kerja; atau</li><li>paling lama 5 (lima) tahun untuk kredit/pembiayaan investasi.</li></ol><p style="margin-bottom: 1rem; color: rgb(38, 59, 94); font-family: Quicksand, sans-serif; font-size: 16px;">Dalam hal diperlukan perpanjangan, suplesi, atau restrukturisasi, maka jangka waktu sebagaimana di atas menjadi:</p><ol style="margin-bottom: 1rem; color: rgb(38, 59, 94); font-family: Quicksand, sans-serif; font-size: 16px; list-style-type: lower-alpha;"><li>untuk pembiayaan kredit modal kerja dapat diperpanjang menjadi maksimum 4 tahun dan;</li><li>untuk kredit/ pembiayaan investasi dapat diperpanjang maksimum 7 tahun terhitung sejak tanggal perjanjian kredit/ pembiayaan awal.</li></ol><p style="margin-bottom: 1rem; color: rgb(38, 59, 94); font-family: Quicksand, sans-serif; font-size: 16px;">Total akumulasi plafon termasuk suplesi atau perpanjangan maksimal Rp75.000.000,- (tujuh puluh lima juta rupiah) per penerima KUR.</p><p style="margin-bottom: 1rem; color: rgb(38, 59, 94); font-family: Quicksand, sans-serif; font-size: 16px;">Jangka waktu KUR Ritel :</p><ol style="margin-bottom: 1rem; color: rgb(38, 59, 94); font-family: Quicksand, sans-serif; font-size: 16px; list-style-type: lower-alpha;"><li>paling lama 4 (empat) Tahun untuk kredit/pembiayaan modal kerja; atau</li><li>paling lama 5 (lima) Tahun untuk kredit/pembiayaan investasi.</li></ol><p style="margin-bottom: 1rem; color: rgb(38, 59, 94); font-family: Quicksand, sans-serif; font-size: 16px;">Dalam hal diperlukan perpanjangan, suplesi, atau restrukturisasi, maka jangka waktu KUR Ritel menjadi :</p><ol style="margin-bottom: 1rem; color: rgb(38, 59, 94); font-family: Quicksand, sans-serif; font-size: 16px; list-style-type: lower-alpha;"><li>untuk kredit/pembiayaan modal kerja dapat diperpanjang menjadi maksimum 5 (lima) tahun dan;</li><li>untuk kredit/pembiayaan investasi dapat diperpanjang menjadi maksimum 7 (tujuh) tahun terhitung sejak tanggal perjanjian kredit/pembiayaan awal.</li></ol><p style="margin-bottom: 1rem; color: rgb(38, 59, 94); font-family: Quicksand, sans-serif; font-size: 16px;">Jangka waktu KUR Penempatan TKI paling lama sama dengan masa kontrak kerja dan tidak melebihi jangka waktu paling lama 3 tahun.</p>',
//                 'created_at' => '2021-12-06 02:02:58',
//                 'id' => 'df672952-8bd4-444b-aea8-a5c292f3f78a',
//                 'img' => NULL,
//                 'slug' => 'pertanyaan-berapa-lama-jangka-waktu-yang-diberikan-kur',
//                 'title' => 'Pertanyaan : Berapa lama jangka waktu yang diberikan KUR ?',
//                 'type' => 'FAQ',
//                 'updated_at' => '2021-12-06 02:05:39',
//             ),
//             4 =>
//             array (
//                 'category_news_id' => NULL,
//             'content' => '<ul style="margin-bottom: 1rem; color: rgb(38, 59, 94); font-family: Quicksand, sans-serif; font-size: 16px;"><li>KUR Mikro: 7% efektif per tahun</li><li>KUR Kecil: 7% efektif per tahun</li><li>KUR Penempatan TKI: 7% efektif per tahun</li><li>KUR Khusus : 7% efektif per tahun</li></ul>',
//                 'created_at' => '2021-12-06 02:03:29',
//                 'id' => '5f5a1f75-00f1-487f-80c2-56946d55b291',
//                 'img' => NULL,
//                 'slug' => 'pertanyaan-berapa-besar-suku-bunga-yang-diberikan-kur',
//                 'title' => 'Pertanyaan : Berapa besar suku bunga yang diberikan KUR ?',
//                 'type' => 'FAQ',
//                 'updated_at' => '2021-12-06 02:06:09',
//             ),
//             5 =>
//             array (
//                 'category_news_id' => NULL,
//             'content' => '<ul style="margin-bottom: 1rem; color: rgb(38, 59, 94); font-family: Quicksand, sans-serif; font-size: 16px;"><li>KUR Mikro: 10,5% (termasuk didalamnya Imbal Jasa Penjaminan)</li><li>KUR Kecil: 5,5% (termasuk didalamnya Imbal Jasa Penjaminan)</li><li>KUR Penempatan TKI: 14% (termasuk didalamnya Imbal Jasa Penjaminan dan Collection Fee)</li></ul>',
//                 'created_at' => '2021-12-06 02:04:25',
//                 'id' => 'fa86e7f3-1dd7-4913-aeda-0f4b10fa9e96',
//                 'img' => NULL,
//                 'slug' => 'pertanyaan-berapa-banyak-subsidi-bunganya',
//                 'title' => 'Pertanyaan : Berapa banyak subsidi bunganya ?',
//                 'type' => 'FAQ',
//                 'updated_at' => '2021-12-06 02:06:18',
//             ),
//             6 =>
//             array (
//                 'category_news_id' => NULL,
//             'content' => '<span style="font-weight: bolder; color: rgb(38, 59, 94); font-family: Quicksand, sans-serif; font-size: 16px;">Sektor Pertanian :</span><span style="color: rgb(38, 59, 94); font-family: Quicksand, sans-serif; font-size: 16px;"></span><p style="margin-bottom: 1rem; color: rgb(38, 59, 94); font-family: Quicksand, sans-serif; font-size: 16px;">Seluruh usaha di sektor pertanian (sektor 1), termasuk tanaman pangan, tanaman hortikultura, perkebunan, dan peternakan).</p><span style="font-weight: bolder; color: rgb(38, 59, 94); font-family: Quicksand, sans-serif; font-size: 16px;">Perikanan :</span><span style="color: rgb(38, 59, 94); font-family: Quicksand, sans-serif; font-size: 16px;"></span><p style="margin-bottom: 1rem; color: rgb(38, 59, 94); font-family: Quicksand, sans-serif; font-size: 16px;">Seluruh usaha di sektor perikanan (sektor 2), termasuk penangkapan dan pembudidayaan ikan).</p><span style="font-weight: bolder; color: rgb(38, 59, 94); font-family: Quicksand, sans-serif; font-size: 16px;">Industri Pengolahan :</span><span style="color: rgb(38, 59, 94); font-family: Quicksand, sans-serif; font-size: 16px;"></span><p style="margin-bottom: 1rem; color: rgb(38, 59, 94); font-family: Quicksand, sans-serif; font-size: 16px;">Seluruh usaha di sektor Industri Pengolahan (sektor 4), termasuk industri kreatif di bidang periklanan, fesyen, film, animasi, video, dan alat mesin pendukung kegiatan ketahanan pangan.</p><span style="font-weight: bolder; color: rgb(38, 59, 94); font-family: Quicksand, sans-serif; font-size: 16px;">Perdagangan :</span><span style="color: rgb(38, 59, 94); font-family: Quicksand, sans-serif; font-size: 16px;"></span><p style="margin-bottom: 1rem; color: rgb(38, 59, 94); font-family: Quicksand, sans-serif; font-size: 16px;">Seluruh usaha di sektor perdagangan (sektor 7), termasuk kuliner dan pedagang eceran.</p><span style="font-weight: bolder; color: rgb(38, 59, 94); font-family: Quicksand, sans-serif; font-size: 16px;">Jasa-Jasa :</span><span style="color: rgb(38, 59, 94); font-family: Quicksand, sans-serif; font-size: 16px;"></span><p style="margin-bottom: 1rem; color: rgb(38, 59, 94); font-family: Quicksand, sans-serif; font-size: 16px;">Seluruh usaha: sektor penyediaan akomodasi dan penyediaan makanan (sektor 8), sektor transportasi – pergudangan - dan komunikasi (sektor 9), sektor real estate - usaha persewaan - jasa perusahaan (sektor 11), sektor jasa pendidikan (sektor 13), sektor jasa kemasyarakatan – sosial budaya – hiburan – perorangan lainnya (sektor 15).</p><span style="font-weight: bolder; color: rgb(38, 59, 94); font-family: Quicksand, sans-serif; font-size: 16px;">Pembiayaan Calon TKI di luar negeri;</span><span style="color: rgb(38, 59, 94); font-family: Quicksand, sans-serif; font-size: 16px;"></span><br style="color: rgb(38, 59, 94); font-family: Quicksand, sans-serif; font-size: 16px;"><span style="font-weight: bolder; color: rgb(38, 59, 94); font-family: Quicksand, sans-serif; font-size: 16px;">Pembiayaan Calon Pekerja Magang di luar negeri.</span>',
//                 'created_at' => '2021-12-06 02:05:26',
//                 'id' => '4c8c7b04-de57-493e-b156-093f00d95de1',
//                 'img' => NULL,
//                 'slug' => 'pertanyaan-apa-saja-sektor-yang-dibiayai-oleh-kur',
//                 'title' => 'Pertanyaan : Apa saja sektor yang dibiayai oleh KUR ?',
//                 'type' => 'FAQ',
//                 'updated_at' => '2021-12-06 02:05:26',
//             ),
//             7 =>
//             array (
//                 'category_news_id' => NULL,
//                 'content' => '<p class="MsoNormal" style="text-align: justify; margin-bottom: 0.0001pt; line-height: normal;"><span style="font-size:12.0pt;mso-fareast-font-family:&quot;Times New Roman&quot;;
// mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin;color:#212529;
// background:#F8F9FA;mso-ansi-language:IN;mso-fareast-language:IN">KUR </span><span style="font-size:12.0pt;mso-fareast-font-family:&quot;Times New Roman&quot;;
// mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin;color:#212529;
// background:#F8F9FA;mso-ansi-language:EN-US;mso-fareast-language:IN" lang="EN-US">Kecil</span><span style="font-size:12.0pt;mso-fareast-font-family:&quot;Times New Roman&quot;;mso-bidi-font-family:
// Calibri;mso-bidi-theme-font:minor-latin;color:#212529;background:#F8F9FA;
// mso-ansi-language:IN;mso-fareast-language:IN"> diberikan kepada penerima KUR
// dengan jumlah </span><span style="font-size:12.0pt;mso-fareast-font-family:
// &quot;Times New Roman&quot;;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin;
// color:#212529;background:#F8F9FA;mso-ansi-language:EN-US;mso-fareast-language:
// IN" lang="EN-US">di atas</span><span style="font-size:12.0pt;mso-fareast-font-family:&quot;Times New Roman&quot;;
// mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin;color:#212529;
// background:#F8F9FA;mso-ansi-language:IN;mso-fareast-language:IN">
// Rp50.000.000,- </span><span style="font-size:12.0pt;mso-fareast-font-family:
// &quot;Times New Roman&quot;;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin;
// color:#212529;background:#F8F9FA;mso-ansi-language:EN-US;mso-fareast-language:
// IN" lang="EN-US">dan paling banyak </span><span style="font-size:12.0pt;mso-fareast-font-family:
// &quot;Times New Roman&quot;;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin;
// color:#212529;background:#F8F9FA;mso-ansi-language:IN;mso-fareast-language:
// IN">Rp</span><span style="font-size:12.0pt;mso-fareast-font-family:
// &quot;Times New Roman&quot;;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin;
// color:#212529;background:#F8F9FA;mso-ansi-language:EN-US;mso-fareast-language:
// IN" lang="EN-US">500</span><span style="font-size:12.0pt;mso-fareast-font-family:&quot;Times New Roman&quot;;
// mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin;color:#212529;
// background:#F8F9FA;mso-ansi-language:IN;mso-fareast-language:IN">.000.000,-
// setiap individu</span><span style="font-size:12.0pt;mso-fareast-font-family:
// &quot;Times New Roman&quot;;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin;
// color:#212529;background:#F8F9FA;mso-ansi-language:EN-US;mso-fareast-language:
// IN"> <span lang="EN-US">atau badan usaha</span></span><span style="font-size:
// 12.0pt;mso-fareast-font-family:&quot;Times New Roman&quot;;mso-bidi-font-family:Calibri;
// mso-bidi-theme-font:minor-latin;color:#212529;background:#F8F9FA;mso-ansi-language:
// IN;mso-fareast-language:IN">, dengan syarat sebagai berikut:</span><span style="font-size:12.0pt;mso-fareast-font-family:&quot;Times New Roman&quot;;mso-bidi-font-family:
// Calibri;mso-bidi-theme-font:minor-latin;mso-ansi-language:IN;mso-fareast-language:
// IN"></span></p>

// <ul type="disc"><li class="MsoNormal" style="text-align: justify; line-height: normal;"><span style="font-size:12.0pt;mso-fareast-font-family:&quot;Times New Roman&quot;;
// mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin;mso-ansi-language:
// IN;mso-fareast-language:IN">Individu/perseorangan atau badan usaha yang
// melakukan usaha yang produktif dan layak</span></li><li class="MsoNormal" style="text-align: justify; line-height: normal;"><span style="font-size:12.0pt;mso-fareast-font-family:&quot;Times New Roman&quot;;
// mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin;mso-ansi-language:
// IN;mso-fareast-language:IN">Usaha mikro, kecil, dan menengah</span></li><li class="MsoNormal" style="text-align: justify; line-height: normal;"><span style="font-size:12.0pt;mso-fareast-font-family:&quot;Times New Roman&quot;;
// mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin;mso-ansi-language:
// IN;mso-fareast-language:IN">Telah melakukan usaha secara aktif minimal 6
// bulan</span></li><li class="MsoNormal" style="text-align: justify; line-height: normal;"><span style="font-size:12.0pt;mso-fareast-font-family:&quot;Times New Roman&quot;;
// mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin;mso-ansi-language:
// IN;mso-fareast-language:IN">Tidak sedang menerima kredit dari perbankan
// kecuali kredit konsumtif seperti KPR, KKB, dan, Kartu Kredit</span></li><li class="MsoNormal" style="text-align: justify; line-height: normal;"><span style="font-size:12.0pt;mso-fareast-font-family:&quot;Times New Roman&quot;;
// mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin;mso-ansi-language:
// IN;mso-fareast-language:IN">Persyaratan administrasi : Identitas berupa
// KTP, Kartu Keluarga (KK), dan surat ijin usaha</span></li><li class="MsoNormal" style="text-align: justify; line-height: normal;"><span style="font-size:12.0pt;mso-fareast-font-family:&quot;Times New Roman&quot;;
// mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin;mso-ansi-language:
// IN;mso-fareast-language:IN">Kelompok Usaha seperti Kelompok Usaha Bersama
// (KUBE), Gabungan Kelompok Tani dan Nelayan (Gapoktan), dan kelompok usaha
// lainnya</span></li></ul>

// <p class="MsoNormal" style="text-align: justify; margin-bottom: 0.0001pt; line-height: normal;"><span style="font-size:12.0pt;mso-fareast-font-family:&quot;Times New Roman&quot;;
// mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin;color:#212529;
// mso-ansi-language:IN;mso-fareast-language:IN">Ketentuan KUR </span><span style="font-size:12.0pt;mso-fareast-font-family:&quot;Times New Roman&quot;;
// mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin;color:#212529;
// mso-ansi-language:EN-US;mso-fareast-language:IN" lang="EN-US">Kecil</span><span style="font-size:12.0pt;mso-fareast-font-family:&quot;Times New Roman&quot;;mso-bidi-font-family:
// Calibri;mso-bidi-theme-font:minor-latin;color:#212529;mso-ansi-language:IN;
// mso-fareast-language:IN">:</span><span style="font-size:12.0pt;mso-fareast-font-family:
// &quot;Times New Roman&quot;;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin;
// mso-ansi-language:IN;mso-fareast-language:IN"></span></p>

// <ol type="1" start="1"><li class="MsoNormal" style="text-align: justify; line-height: normal;"><span style="font-size:12.0pt;mso-fareast-font-family:&quot;Times New Roman&quot;;
// mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin;color:#212529;
// mso-ansi-language:IN;mso-fareast-language:IN">Suku bunga/marjin KUR </span><span style="font-size:12.0pt;mso-fareast-font-family:&quot;Times New Roman&quot;;
// mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin;color:#212529;
// mso-ansi-language:EN-US;mso-fareast-language:IN" lang="EN-US">Kecil</span><span style="font-size:12.0pt;mso-fareast-font-family:&quot;Times New Roman&quot;;
// mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin;color:#212529;
// mso-ansi-language:IN;mso-fareast-language:IN"> sebesar 6% efektif pertahun
// atau disesuaikan dengan suku bunga/marjin flat/anuitas yang setara</span><span style="font-size:12.0pt;mso-fareast-font-family:&quot;Times New Roman&quot;;
// mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin;mso-ansi-language:
// IN;mso-fareast-language:IN"></span></li><li class="MsoNormal" style="text-align: justify; line-height: normal;"><span style="font-size:12.0pt;mso-fareast-font-family:&quot;Times New Roman&quot;;
// mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin;color:#212529;
// mso-ansi-language:IN;mso-fareast-language:IN">Jangka waktu KUR Kecil:</span><span style="font-size:12.0pt;mso-fareast-font-family:&quot;Times New Roman&quot;;
// mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin;mso-ansi-language:
// IN;mso-fareast-language:IN"></span></li><ul type="circle"><li class="MsoNormal" style="text-align: justify; color: rgb(33, 37, 41); line-height: normal;"><span style="font-size:12.0pt;mso-fareast-font-family:&quot;Times New Roman&quot;;
// mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin;mso-ansi-language:
// EN-US;mso-fareast-language:IN" lang="EN-US">P</span><span style="font-size:12.0pt;
// mso-fareast-font-family:&quot;Times New Roman&quot;;mso-bidi-font-family:Calibri;
// mso-bidi-theme-font:minor-latin;mso-ansi-language:IN;mso-fareast-language:
// IN">aling lama 4 (empat) tahun untuk kredit/ pembiayaan modal kerja; atau</span></li><li class="MsoNormal" style="text-align: justify; color: rgb(33, 37, 41); line-height: normal;"><span style="font-size:12.0pt;mso-fareast-font-family:&quot;Times New Roman&quot;;
// mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin;mso-ansi-language:
// IN;mso-fareast-language:IN">paling lama 5 (lima) tahun untuk
// kredit/pembiayaan investasi, dengan grace period sesuai dengan penilaian
// Penyalur KUR.</span></li></ul><li class="MsoNormal" style="text-align: justify; line-height: normal;"><span style="font-size:12.0pt;mso-fareast-font-family:&quot;Times New Roman&quot;;
// mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin;color:#212529;
// mso-ansi-language:IN;mso-fareast-language:IN">Dalam hal skema pembayaran
// KUR kecil, Penerima KUR dapat melakukan pembayaran pokok dan Suku
// Bunga/Marjin KUR kecil secara angsuran berkala dan/atau pembayaran
// sekaligus saat jatuh tempo sesuai dengan kesepakatan antara Penerima KUR
// dan Penyalur KUR dengan memerhatikan kebutuhan skema pembiayaan
// masing-masing Penerima KUR</span><span style="font-size:12.0pt;mso-fareast-font-family:
// &quot;Times New Roman&quot;;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin;
// mso-ansi-language:IN;mso-fareast-language:IN"></span></li></ol>',
//                 'created_at' => '2021-12-08 04:00:38',
//                 'id' => '709ab840-0fe5-415e-a775-7791bf49630b',
//                 'img' => 'http://phplaravel-151716-2282619.cloudwaysapps.com/storage/page/f64b733863c524456ef82911fd205a7b_1638936183_300px.jpg',
//                 'short_description' => 'KUR dengan jumlah di atas Rp50.000.000,- dan paling banyak Rp500.000.000',
//                 'slug' => 'kur-kecil',
//                 'title' => 'KUR Kecil',
//                 'type' => 'REQUIREMENT',
//                 'updated_at' => '2021-12-20 05:50:17',
//             ),
//             8 =>
//             array (
//                 'category_news_id' => NULL,
//                 'content' => '<p class="MsoNormal" style="text-align: justify; margin-bottom: 0.0001pt; line-height: normal;"><span style="font-size:12.0pt;mso-fareast-font-family:&quot;Times New Roman&quot;;
// mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin;color:#212529;
// background:#F8F9FA;mso-ansi-language:IN;mso-fareast-language:IN">KUR Mikro
// diberikan kepada penerima KUR dengan jumlah paling banyak Rp50.000.000,- setiap
// individu, dengan syarat sebagai berikut: </span><span style="font-size:12.0pt;
// mso-fareast-font-family:&quot;Times New Roman&quot;;mso-bidi-font-family:Calibri;
// mso-bidi-theme-font:minor-latin;mso-ansi-language:IN;mso-fareast-language:IN"></span></p>

// <ul type="disc"><li class="MsoNormal" style="text-align: justify; line-height: normal;"><span style="font-size:12.0pt;mso-fareast-font-family:&quot;Times New Roman&quot;;
// mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin;mso-ansi-language:
// IN;mso-fareast-language:IN">Individu/perseorangan atau badan usaha yang
// melakukan usaha yang produktif dan layak</span></li><li class="MsoNormal" style="text-align: justify; line-height: normal;"><span style="font-size:12.0pt;mso-fareast-font-family:&quot;Times New Roman&quot;;
// mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin;mso-ansi-language:
// IN;mso-fareast-language:IN">Usaha mikro, kecil, dan menengah</span></li><li class="MsoNormal" style="text-align: justify; line-height: normal;"><span style="font-size:12.0pt;mso-fareast-font-family:&quot;Times New Roman&quot;;
// mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin;mso-ansi-language:
// IN;mso-fareast-language:IN">Telah melakukan usaha secara aktif minimal 6
// bulan</span></li><li class="MsoNormal" style="text-align: justify; line-height: normal;"><span style="font-size:12.0pt;mso-fareast-font-family:&quot;Times New Roman&quot;;
// mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin;mso-ansi-language:
// IN;mso-fareast-language:IN">Tidak sedang menerima kredit dari perbankan
// kecuali kredit konsumtif seperti KPR, KKB, dan, Kartu Kredit</span></li><li class="MsoNormal" style="text-align: justify; line-height: normal;"><span style="font-size:12.0pt;mso-fareast-font-family:&quot;Times New Roman&quot;;
// mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin;mso-ansi-language:
// IN;mso-fareast-language:IN">Persyaratan administrasi : Identitas berupa
// KTP, Kartu Keluarga (KK), dan surat ijin usaha</span></li><li class="MsoNormal" style="text-align: justify; line-height: normal;"><span style="font-size:12.0pt;mso-fareast-font-family:&quot;Times New Roman&quot;;
// mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin;mso-ansi-language:
// IN;mso-fareast-language:IN">Kelompok Usaha seperti Kelompok Usaha Bersama
// (KUBE), Gabungan Kelompok Tani dan Nelayan (Gapoktan), dan kelompok usaha
// lainnya</span></li></ul>

// <p class="MsoNormal" style="text-align: justify; margin-bottom: 0.0001pt; line-height: normal;"><span style="font-size:12.0pt;mso-fareast-font-family:&quot;Times New Roman&quot;;
// mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin;color:#212529;
// mso-ansi-language:IN;mso-fareast-language:IN">Ketentuan KUR Mikro:</span><span style="font-size:12.0pt;mso-fareast-font-family:&quot;Times New Roman&quot;;mso-bidi-font-family:
// Calibri;mso-bidi-theme-font:minor-latin;mso-ansi-language:IN;mso-fareast-language:
// IN"></span></p>

// <ol type="1" start="1"><li class="MsoNormal" style="text-align: justify; line-height: normal;"><span style="font-size:12.0pt;mso-fareast-font-family:&quot;Times New Roman&quot;;
// mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin;color:#212529;
// mso-ansi-language:IN;mso-fareast-language:IN">Suku bunga/marjin KUR Mikro
// sebesar 6% efektif pertahun atau disesuaikan dengan suku bunga/marjin
// flat/anuitas yang setara</span><span style="font-size:12.0pt;mso-fareast-font-family:
// &quot;Times New Roman&quot;;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin;
// mso-ansi-language:IN;mso-fareast-language:IN"></span></li><li class="MsoNormal" style="text-align: justify; line-height: normal;"><span style="font-size:12.0pt;mso-fareast-font-family:&quot;Times New Roman&quot;;
// mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin;color:#212529;
// mso-ansi-language:IN;mso-fareast-language:IN">Jangka waktu KUR mikro:</span><span style="font-size:12.0pt;mso-fareast-font-family:&quot;Times New Roman&quot;;
// mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin;mso-ansi-language:
// IN;mso-fareast-language:IN"></span></li><ul type="circle"><li class="MsoNormal" style="text-align: justify; color: rgb(33, 37, 41); line-height: normal;"><span style="font-size:12.0pt;mso-fareast-font-family:&quot;Times New Roman&quot;;
// mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin;mso-ansi-language:
// IN;mso-fareast-language:IN">Paling lama 3 (tiga) tahun untuk
// kredit/pembiayaan modal kerja; atau</span></li><li class="MsoNormal" style="text-align: justify; color: rgb(33, 37, 41); line-height: normal;"><span style="font-size:12.0pt;mso-fareast-font-family:&quot;Times New Roman&quot;;
// mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin;mso-ansi-language:
// IN;mso-fareast-language:IN">Paling lama 5 (lima) tahun untuk
// kredit/pembiayaan investasi, dengan grace period sesuai dengan penilaian
// Penyalur KUR.</span></li></ul><li class="MsoNormal" style="text-align: justify; line-height: normal;"><span style="font-size:12.0pt;mso-fareast-font-family:&quot;Times New Roman&quot;;
// mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin;color:#212529;
// mso-ansi-language:IN;mso-fareast-language:IN">Dalam hal skema pembayaran
// KUR mikro, Penerima KUR dapat melakukan pembayaran pokok dan Suku
// Bunga/Marjin KUR mikro secara angsuran berkala dan/atau pembayaran
// sekaligus saat jatuh tempo sesuai dengan kesepakatan antara Penerima KUR
// dan Penyalur KUR dengan memerhatikan kebutuhan skema pembiayaan
// masing–masing penerima KUR</span><span style="font-size:12.0pt;mso-fareast-font-family:
// &quot;Times New Roman&quot;;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin;
// mso-ansi-language:IN;mso-fareast-language:IN"></span></li></ol>',
//                 'created_at' => '2021-12-08 04:04:10',
//                 'id' => '17718726-b769-4148-b88b-313f052cbdc4',
//                 'img' => 'http://phplaravel-151716-2282619.cloudwaysapps.com/storage/page/80e8d2726d0c04274bccb4345d56e1be_1638936250_300px.jpg',
//                 'slug' => 'kur-mikro',
//                 'title' => 'KUR Mikro',
//                 'type' => 'REQUIREMENT',
//                 'updated_at' => '2021-12-20 05:50:34',
//             ),
//             9 =>
//             array (
//                 'category_news_id' => 'be9f9b72-bca8-42bf-a692-6eb26cdb01a8',
//             'content' => '<p style="margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p><div><br></div>',
//                 'created_at' => '2021-12-16 07:07:00',
//                 'id' => '10a644ad-4e1a-4ae1-9144-96cd2d93889a',
//                 'img' => 'https://phplaravel-151716-2282619.cloudwaysapps.com/storage/page/cea1dd63de123c0dff3bf3d9c3e32cb6_1640070878_300px.jpg',
//                 'slug' => 'bersama-membangun-negeri',
//                 'title' => 'Bersama membangun negeri',
//                 'type' => 'NEWS',
//                 'updated_at' => '2021-12-21 07:14:38',
//             ),
//             10 =>
//             array (
//                 'category_news_id' => '4ed54084-7189-4a5a-974f-ba5b71164d1a',
//                 'content' => 't
// is a long established fact that a reader will be distracted by the
// readable content of a page when looking at its layout. The point of
// using Lorem Ipsum is that it has a more-or-less normal distribution of
// letters, as opposed to using \'Content here, content here\', making it
// look like readable English. Many desktop publishing packages and web
// page editors now use Lorem Ipsum as their default model text, and a
// search for \'lorem ipsum\' will uncover many web sites still in their
// infancy. Various versions have evolved over the years, sometimes by
// accident, sometimes on purpose (injected humour and the like).<div><br><br></div>',
//                 'created_at' => '2021-12-20 02:55:23',
//                 'id' => '2a923831-5eb0-45c9-9626-f1265a53f7f6',
//                 'img' => 'https://phplaravel-151716-2282619.cloudwaysapps.com/storage/page/879d33dc90dd9446147f8bff52392752_1640070582_300px.jpg',
//                 'short_description' => NULL,
//                 'slug' => 'dengan-ini-pemerintah-bekerjama-dengan-bank-untuk-layanan-kur',
//                 'title' => 'Dengan ini pemerintah bekerjama dengan BANK untuk layanan KUR',
//                 'type' => 'NEWS',
//                 'updated_at' => '2021-12-21 07:09:42',
//             ),
//             11 =>
//             array (
//                 'category_news_id' => NULL,
//             'content' => '<p dir="ltr" style="margin-top: 14pt; margin-bottom: 14pt; line-height: 1.2;"><span style="font-size: 12pt; font-family: &quot;Times New Roman&quot;; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;">Syarat dan Ketentuan:</span></p><p dir="ltr" style="margin-top: 14pt; margin-bottom: 14pt; line-height: 1.2;"><span style="font-size: 12pt; font-family: &quot;Times New Roman&quot;; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;">- Memiliki Usaha Produktif</span></p><p dir="ltr" style="margin-top: 14pt; margin-bottom: 14pt; line-height: 1.2;"><span style="font-size: 12pt; font-family: &quot;Times New Roman&quot;; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;">- Lama usaha bisa kurang dari 6 bulan</span></p><p dir="ltr" style="margin-top: 14pt; margin-bottom: 14pt; line-height: 1.2;"><span style="font-size: 12pt; font-family: &quot;Times New Roman&quot;; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;">dalam hal ini&nbsp;calon debitur KUR Super Mikro yang waktu pendirian usahanya kurang dari 6 (enam) bulan harus memenuhi salah satu persyaratan sebagai berikut:</span></p><ol style="margin-bottom: 0px; padding-inline-start: 48px;"><li dir="ltr" aria-level="1" style="list-style-type: decimal; font-size: 12pt; font-family: &quot;Times New Roman&quot;; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre;"><p dir="ltr" role="presentation" style="margin-top: 14pt; margin-bottom: 0pt; line-height: 1.2;"><span style="font-size: 12pt; background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;">Mengikuti pendampingan</span></p></li><li dir="ltr" aria-level="1" style="list-style-type: decimal; font-size: 12pt; font-family: &quot;Times New Roman&quot;; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre;"><p dir="ltr" role="presentation" style="margin-top: 0pt; margin-bottom: 0pt; line-height: 1.2;"><span style="font-size: 12pt; background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;">Mengikuti pelatihan kewirausahaan atau pelatihan lainnya</span></p></li><li dir="ltr" aria-level="1" style="list-style-type: decimal; font-size: 12pt; font-family: &quot;Times New Roman&quot;; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre;"><p dir="ltr" role="presentation" style="margin-top: 0pt; margin-bottom: 0pt; line-height: 1.2;"><span style="font-size: 12pt; background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;">Tergabung dalam kelompok usaha</span></p></li><li dir="ltr" aria-level="1" style="list-style-type: decimal; font-size: 12pt; font-family: &quot;Times New Roman&quot;; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre;"><p dir="ltr" role="presentation" style="margin-top: 0pt; margin-bottom: 14pt; line-height: 1.2;"><span style="font-size: 12pt; background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;">Memiliki anggota keluarga yang telah mempunyai usaha produktif yang dan layak</span></p></li></ol><p dir="ltr" style="margin-top: 14pt; margin-bottom: 14pt; line-height: 1.2;"><span style="font-size: 12pt; font-family: &quot;Times New Roman&quot;; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;">- Fotocopy KK dan KTP</span></p><p dir="ltr" style="margin-top: 14pt; margin-bottom: 14pt; line-height: 1.2;"><span style="font-size: 12pt; font-family: &quot;Times New Roman&quot;; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;">- Memiliki Surat Keterangan Usaha yang dikeluarkan minimal setingkat RT/RW</span></p><p dir="ltr" style="margin-top: 14pt; margin-bottom: 14pt; line-height: 1.2;"><span style="font-size: 12pt; font-family: &quot;Times New Roman&quot;; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;">- Belum pernah mendapatkan KUR dan tidak sedang menerima pinjaman komersial</span></p>',
//                 'created_at' => '2021-12-20 05:51:05',
//                 'id' => '71fa246f-0bdf-4ecc-854b-8f26e0ffb814',
//                 'img' => 'https://phplaravel-151716-2282619.cloudwaysapps.com/storage/page/02b940d4a937b163f650f77da0afab65_1639979465_300px.png',
//                 'slug' => 'kur-super-mikro',
//                 'title' => 'KUR Super Mikro',
//                 'type' => 'REQUIREMENT',
//                 'updated_at' => '2021-12-27 03:54:41',
//             ),
//             12 =>
//             array (
//                 'category_news_id' => '904b871a-6fc4-4d10-851e-78f1fa0e8c6b',
//             'content' => '<p style="margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer viverra sed nibh quis vulputate. Pellentesque ultrices massa in tincidunt ultrices. Aliquam commodo dapibus faucibus. Donec semper sit amet massa nec molestie. Cras placerat sollicitudin pulvinar. Donec eget ipsum id ex mattis ullamcorper. Donec nec cursus justo.</p><p style="margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;">Praesent eget nunc in neque tincidunt ornare eget non risus. Fusce faucibus aliquet elit ut lacinia. Morbi consectetur dui vitae nunc convallis, sed pulvinar est venenatis. Nulla tristique velit vitae bibendum pretium. Quisque dictum libero vitae neque consectetur luctus. Etiam non consectetur arcu. Donec vitae ex tortor. Donec tristique id leo tempus sagittis. Integer ut posuere sem. Integer aliquam dignissim ipsum, ut ultricies odio porttitor non.</p><p style="margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;">Nullam sodales vulputate nulla eu vehicula. Aenean dictum justo vel lobortis auctor. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vestibulum eget quam vel augue blandit maximus et ut orci. In tortor mi, elementum in quam vel, pharetra venenatis eros. Donec sagittis sapien nec elementum rhoncus. Sed cursus urna id nibh ultricies, a molestie magna consectetur. Vivamus eros mi, faucibus id ullamcorper non, efficitur molestie urna. Integer bibendum, risus sed bibendum hendrerit, metus massa pellentesque ex, egestas finibus ipsum elit non odio.</p><p style="margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;">Cras risus enim, posuere in felis eu, rhoncus tincidunt massa. Duis nec ultrices felis, a eleifend lectus. Pellentesque viverra ac magna ut viverra. Suspendisse fringilla, elit vel cursus facilisis, quam nunc dignissim arcu, quis mattis magna odio ac magna. Suspendisse potenti. Aliquam dignissim sagittis nulla in dapibus. Sed tincidunt nibh id ullamcorper convallis. Duis auctor, orci vel lacinia facilisis, nunc erat placerat nibh, eu pulvinar ante dolor in nibh. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aliquam rhoncus sit amet elit nec lacinia. Nullam viverra finibus convallis. Duis gravida posuere dapibus. Ut sagittis ipsum tortor, sed venenatis sem suscipit eget. Pellentesque consectetur risus vel molestie viverra. Integer fermentum augue fringilla urna pharetra, eget consectetur diam tincidunt.</p><p style="margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;">Nunc eget iaculis felis. Nam luctus justo et nunc maximus luctus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Quisque leo nibh, egestas sit amet consequat at, fermentum a orci. Sed ac ultrices tellus, ac pulvinar diam. Mauris nunc nisi, dignissim interdum ornare at, lobortis ac augue. Integer vehicula erat et enim commodo ultrices. Maecenas mattis risus lacus. Mauris quis faucibus velit. Etiam blandit, neque in facilisis vestibulum, tortor urna varius nibh, ut vehicula ex nulla nec mi. Morbi sit amet blandit nisl. Nunc nec condimentum neque. Curabitur sed leo nec metus elementum elementum. Sed consequat ex mauris.</p>',
//                 'created_at' => '2022-01-06 11:26:43',
//                 'id' => '8a92508d-d795-47f2-aab9-41f1a282396e',
//                 'img' => 'https://kurjogja.id/storage/page/a386b09e174e4d6161bf1dd25634247b_1641439603_300px.jpg',
//                 'slug' => 'ini-adalah-judul-berita',
//                 'title' => 'ini adalah judul berita',
//                 'type' => 'NEWS',
//                 'updated_at' => '2022-01-06 11:26:43',
//             ),
//             13 =>
//             array (
//                 'category_news_id' => NULL,
//                 'content' => 'Mudah, cepat, serta sangat membantu dalam proses pengajuan KUR',
//                 'created_at' => '2022-02-02 12:05:18',
//                 'id' => '43d2cc7f-8c9f-4566-a225-cfde850ec2f5',
//                 'img' => 'https://kurjogja.id/storage/page/05bce4b9ca3e84bcb6ccb68c0758f431_1643774718_300px.jpg',
//                 'slug' => 'wenny-karmila',
//                 'title' => 'Wenny Karmila',
//                 'type' => 'TESTIMONIAL',
//                 'updated_at' => '2022-02-02 12:05:18',
//             ),
//             14 =>
//             array (
//                 'category_news_id' => NULL,
//                 'content' => 'Saya merasa terbantu dengan adanya website KUR, sehingga bisa untuk mengembangkan usaha lagi',
//                 'created_at' => '2022-02-03 15:24:24',
//                 'id' => 'd591a368-5fd8-4436-99c6-524fe9c594c6',
//                 'img' => 'https://kurjogja.id/storage/page/784572ba421b961f5f11f4cbdc505990_1643873064_300px.jpg',
//                 'slug' => 'suroso',
//                 'title' => 'Suroso',
//                 'type' => 'TESTIMONIAL',
//                 'updated_at' => '2022-02-03 16:08:35',
//             ),
//             15 =>
//             array (
//                 'category_news_id' => NULL,
//                 'content' => 'Lebih memudahkan dan lebih cepat.',
//                 'created_at' => '2022-02-03 16:08:22',
//                 'id' => 'fcbc4214-7f4e-40ce-be5a-7976e340d362',
//                 'img' => 'https://kurjogja.id/storage/page/c69ec3678529128c72e6ca36a6bed524_1643875702_300px.jpg',
//                 'slug' => 'zumroh-farida',
//                 'title' => 'Zumroh Farida',
//                 'type' => 'TESTIMONIAL',
//                 'updated_at' => '2022-02-03 16:08:22',
//             ),
//             16 =>
//             array (
//                 'category_news_id' => NULL,
//                 'content' => 'Syarat pengajuan sangat tidak rumit, pak mantri nya ramah , saat pencairan juga cepat, yang paling penting bunganya tidak banyak',
//                 'created_at' => '2022-02-04 10:01:54',
//                 'id' => '0f9cea35-e998-4491-8a15-7d9ae65404e7',
//                 'img' => 'https://kurjogja.id/storage/page/d892a1d4b965ba93fa0c5aa934c62fb4_1643940114_300px.jpg',
//                 'slug' => 'fitri-mulyaningsih',
//                 'title' => 'Fitri Mulyaningsih',
//                 'type' => 'TESTIMONIAL',
//                 'updated_at' => '2022-02-04 10:01:54',
//             ),
//             17 =>
//             array (
//                 'category_news_id' => NULL,
//                 'content' => 'Alhamdulillah dengan adanya website sy mendapat kemudahan mengenai informasi KUR dan syaratÂ² pengajuannya.. selain itu saya juga mendapat pelayanan yang baik dan sigap dari pihak bank BRI, saya sangat berterima kasih karna dengan adanya layanan ini, usaha sy bisa berjalan dengan baik..&nbsp;',
//                 'created_at' => '2022-02-04 10:07:33',
//                 'id' => '95cb7b16-869d-42e1-b0ab-7245b35f2715',
//                 'img' => 'https://kurjogja.id/storage/page/7a95d80743bdfd7773c94fc714c3df4e_1643940453_300px.jpg',
//                 'slug' => 'devri-harmanda-putra',
//                 'title' => 'Devri Harmanda Putra',
//                 'type' => 'TESTIMONIAL',
//                 'updated_at' => '2022-02-04 10:07:33',
//             ),
//             18 =>
//             array (
//                 'category_news_id' => NULL,
//                 'content' => 'Mantab, menjadi lebih mudah untuk pengajuan',
//                 'created_at' => '2022-02-04 10:10:01',
//                 'id' => 'fc0eba78-6bcc-4a60-9c6b-50dd708c395e',
//                 'img' => 'https://kurjogja.id/storage/page/5c6c1235580298c872c2672bba4b1b66_1643940601_300px.jpg',
//                 'slug' => 'muhammad-tamyiz',
//                 'title' => 'Muhammad tamyiz',
//                 'type' => 'TESTIMONIAL',
//                 'updated_at' => '2022-02-04 10:10:01',
//             ),
//             19 =>
//             array (
//                 'category_news_id' => NULL,
//                 'content' => 'Pelayanan cepat dan mudah',
//                 'created_at' => '2022-02-04 10:22:38',
//                 'id' => '8d4578db-174a-4f44-a81e-273e1b12e97d',
//                 'img' => 'https://kurjogja.id/storage/page/eb7b39f86ca686d91095a5eb005a4c82_1643941358_300px.jpg',
//                 'slug' => 'sutrisni',
//                 'title' => 'Sutrisni',
//                 'type' => 'TESTIMONIAL',
//                 'updated_at' => '2022-02-04 10:22:38',
//             ),
//             20 =>
//             array (
//                 'category_news_id' => NULL,
//                 'content' => 'Bunga ringan tenor panjang',
//                 'created_at' => '2022-02-04 10:25:27',
//                 'id' => '7765ce37-96f7-4095-acc0-717d2a737686',
//                 'img' => 'https://kurjogja.id/storage/page/756631bbc4b1c1244abf424dbefac3bc_1643941527_300px.jpg',
//                 'slug' => 'supriyanto',
//                 'title' => 'Supriyanto',
//                 'type' => 'TESTIMONIAL',
//                 'updated_at' => '2022-02-04 10:25:27',
//             ),
//             21 =>
//             array (
//                 'category_news_id' => NULL,
//                 'content' => 'Awalnya hanya usaha rumahan dengan omset hanya 10jt/bln. Sejak ada bantuan KUR, usaha kami berkembang di tempat baru dengan omset 5x lipat/bln. Percaya ga percaya, tapi ini yg terjadi pada usaha kami. Terima kasih KUR, terutama BRI yg sdh percaya pada kami.',
//                 'created_at' => '2022-02-04 10:28:21',
//                 'id' => 'f4485aea-026b-455a-8506-f7a264810101',
//                 'img' => 'https://kurjogja.id/storage/page/02e495f7ace0436d7b4486e0348896d1_1643941700_300px.jpg',
//                 'slug' => 'agita-isfiani-kharisma',
//                 'title' => 'Agita isfiani kharisma',
//                 'type' => 'TESTIMONIAL',
//                 'updated_at' => '2022-02-04 10:28:21',
//             ),
//             22 =>
//             array (
//                 'category_news_id' => NULL,
//                 'content' => 'KUR adalah soulmate UMKM',
//                 'created_at' => '2022-02-04 10:30:05',
//                 'id' => '43e45f43-f964-43b7-804a-5325d65c8fc0',
//                 'img' => 'https://kurjogja.id/storage/page/51a7df07cae6e9cdf0915c25d4b54926_1643941805_300px.jpg',
//                 'slug' => 'adhi-purnama',
//                 'title' => 'Adhi Purnama',
//                 'type' => 'TESTIMONIAL',
//                 'updated_at' => '2022-02-04 10:30:05',
//             ),
//             23 =>
//             array (
//                 'category_news_id' => NULL,
//                 'content' => 'Pengajuan kur melalui website kurjogja.id sangat cepat ditanggapi. Trimakasih Bri Unit Pajangan',
//                 'created_at' => '2022-02-04 10:31:56',
//                 'id' => '8bc208a6-a2fd-409f-aa2a-b41d13db5b5c',
//                 'img' => 'https://kurjogja.id/storage/page/5c6c1235580298c872c2672bba4b1b66_1643941916_300px.jpg',
//                 'slug' => 'ria-putri-aristantia',
//                 'title' => 'Ria Putri Aristantia',
//                 'type' => 'TESTIMONIAL',
//                 'updated_at' => '2022-02-04 10:31:56',
//             ),
//         ));

    }
}
