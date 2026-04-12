<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        $faqs = [
            [
                'question' => 'Bagaimana cara mengirim naskah ke Pustaka Aksara?',
                'answer' => 'Anda dapat mengirim naskah melalui portal kami di halaman Kirim Naskah. Pastikan naskah Anda sudah dalam format .doc atau .docx, dilengkapi sinopsis singkat, dan biodata penulis. Tim kami akan merespons dalam 14 hari kerja.',
                'category_id' => null,
                'order' => 1,
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'question' => 'Apa perbedaan antara penerbitan tradisional dan self-publishing?',
                'answer' => 'Pada penerbitan tradisional, seluruh biaya produksi ditanggung oleh penerbit dan penulis menerima royalti sekitar 10%. Seleksi naskah sangat ketat. Pada self-publishing, penulis menanggung biaya produksi tetapi memiliki kendali penuh atas proses kreatif dan mendapatkan keuntungan yang lebih besar setelah biaya operasional.',
                'category_id' => null,
                'order' => 2,
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'question' => 'Berapa lama proses penerbitan dari naskah hingga jadi buku?',
                'answer' => 'Proses penerbitan biasanya memakan waktu 3-6 bulan, tergantung pada kompleksitas naskah, revisi yang diperlukan, dan antrean produksi. Naskah yang sudah final tanpa banyak revisi dapat diselesaikan lebih cepat, sekitar 2-3 bulan.',
                'category_id' => null,
                'order' => 3,
                'is_active' => true,
                'is_featured' => false,
            ],
            [
                'question' => 'Bagaimana sistem royalti untuk penulis?',
                'answer' => 'Untuk penerbitan tradisional, penulis mendapatkan royalti 10% dari harga jual buku untuk setiap eksemplar yang terjual. Pembayaran royalti dilakukan setiap 6 bulan sekali (semesteran) disertai laporan penjualan detail. Untuk self-publishing, penulis mendapatkan hingga 100% keuntungan bersih setelah dikurangi biaya produksi dan operasional.',
                'category_id' => null,
                'order' => 4,
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'question' => 'Kapan penulis menerima laporan penjualan?',
                'answer' => 'Laporan penjualan dikirimkan setiap 6 bulan sekali, yaitu pada bulan Januari untuk periode Juli-Desember tahun sebelumnya, dan bulan Juli untuk periode Januari-Juni tahun berjalan. Pembayaran royalti ditransfer maksimal 30 hari setelah laporan dikirim.',
                'category_id' => null,
                'order' => 5,
                'is_active' => true,
                'is_featured' => false,
            ],
            [
                'question' => 'Apakah penulis harus menyediakan ISBN sendiri?',
                'answer' => 'Tidak perlu. Pustaka Aksara akan mengurus pengurusan ISBN, hak cipta, dan katalogisasi ke Perpustakaan Nasional secara gratis untuk semua buku yang diterbitkan melalui jalur penerbitan tradisional maupun self-publishing.',
                'category_id' => null,
                'order' => 6,
                'is_active' => true,
                'is_featured' => false,
            ],
            [
                'question' => 'Format naskah seperti apa yang diterima?',
                'answer' => 'Kami menerima naskah dalam format Microsoft Word (.doc/.docx) atau Google Docs. Gunakan font Times New Roman ukuran 12, spasi 1.5, dan margin standar. Untuk naskah fiksi, pastikan sudah melalui proses swa-edit minimal. Kami juga menerima naskah non-fiksi dengan outline yang jelas dan referensi lengkap.',
                'category_id' => null,
                'order' => 7,
                'is_active' => true,
                'is_featured' => false,
            ],
            [
                'question' => 'Apakah buku akan didistribusikan ke toko buku fisik?',
                'answer' => 'Ya. Buku yang diterbitkan melalui jalur tradisional akan didistribusikan ke jaringan toko buku besar nasional seperti Gramedia, Gunung Agung, dan toko buku regional. Buku juga akan tersedia di platform e-commerce seperti Tokopedia, Shopee, dan marketplace buku online.',
                'category_id' => null,
                'order' => 8,
                'is_active' => true,
                'is_featured' => false,
            ],
            [
                'question' => 'Apakah saya tetap memegang hak cipta atas naskah saya?',
                'answer' => 'Ya, sepenuhnya. Penulis tetap memegang hak cipta atas karya mereka. Pustaka Aksara hanya mendapatkan hak eksklusif untuk menerbitkan dan mendistribusikan buku sesuai dengan perjanjian kerjasama yang ditandatangani. Detail hak dan kewajiban akan dijelaskan dalam kontrak penerbitan.',
                'category_id' => null,
                'order' => 9,
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'question' => 'Bagaimana cara menghubungi tim editorial?',
                'answer' => 'Anda dapat menghubungi tim editorial melalui email editorial@pustakaaksara.id atau WhatsApp di nomor (021) 555-0123 pada jam kerja (Senin-Jumat, 09.00-17.00 WIB). Kami juga menyediakan form konsultasi di halaman Layanan Penulis.',
                'category_id' => null,
                'order' => 10,
                'is_active' => true,
                'is_featured' => false,
            ],
            [
                'question' => 'Apakah ada biaya untuk proses editing?',
                'answer' => 'Untuk penerbitan tradisional, biaya editing sudah ditanggung oleh penerbit. Untuk self-publishing, biaya editing termasuk dalam paket penerbitan yang Anda pilih. Kami menawarkan berbagai paket layanan editing yang dapat disesuaikan dengan kebutuhan dan budget Anda.',
                'category_id' => null,
                'order' => 11,
                'is_active' => true,
                'is_featured' => false,
            ],
            [
                'question' => 'Apakah penulis mendapatkan buku gratis setelah terbit?',
                'answer' => 'Ya. Setiap penulis akan mendapatkan 10-20 eksemplar gratis (tergantung jenis kontrak) untuk kebutuhan promosi dan koleksi pribadi. Penulis juga berhak membeli buku tambahan dengan harga diskon khusus penulis sebesar 40-50% dari harga jual.',
                'category_id' => null,
                'order' => 12,
                'is_active' => true,
                'is_featured' => false,
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::updateOrCreate(
                ['question' => $faq['question']],
                $faq
            );
        }
    }
}
