<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('kategori', function (Blueprint $table) {
        $table->id();
        $table->string('nama_kategori');
        $table->timestamps();
    });

    Schema::create('tanah', function (Blueprint $table) {
        $table->id();
        $table->string('nama_tanah');
        $table->string('kode_tanah');
        $table->string('luas');
        $table->string('no_sertifikat');
        $table->timestamps();
    });

    Schema::create('bangunan', function (Blueprint $table) {
        $table->id();
        $table->string('nama_bangunan');
        $table->string('kode_bangunan');
        
        // foreign key ke tanah
        $table->unsignedBigInteger('tanah_id');
        $table->foreign('tanah_id')->references('id')->on('tanah')->onDelete('cascade');
        
        $table->timestamps();
    });

    Schema::create('ruangan', function (Blueprint $table) {
        $table->id();
        $table->string('nama_ruangan');
        $table->string('kode_ruangan');

        // foreign key ke bangunan
        $table->unsignedBigInteger('bangunan_id');
        $table->foreign('bangunan_id')->references('id')->on('bangunan')->onDelete('cascade');

        $table->timestamps();
    });

    Schema::create('barangs', function (Blueprint $table) {
        $table->id();
        $table->string('nama_barang');
        $table->string('kode_inventaris');

        // foreign key ke kategori
        $table->unsignedBigInteger('kategori_id');
        $table->foreign('kategori_id')->references('id')->on('kategori')->onDelete('cascade');

        // foreign key ke ruangan
        $table->unsignedBigInteger('ruangan_id');
        $table->foreign('ruangan_id')->references('id')->on('ruangan')->onDelete('cascade');

        $table->integer('tahun_pengadaan');
        $table->string('sumber_dana');
        $table->string('kondisi');
        $table->timestamps();
    });

    Schema::create('referensi', function (Blueprint $table) {
            $table->id('tabel_id'); // primary key auto increment
            $table->tinyInteger('jenis')->nullable(false); // tinyint not null
            $table->unsignedBigInteger('id')->unique(); // ini jadi FK ke users->id
            $table->string('deskripsi', 255)->nullable(false);
            $table->tinyInteger('status')->default(0)->nullable(false); // default 0

            $table->timestamps();

            // foreign key ke tabel users, kolom role (bisa di sesuaikan)
            $table->foreign('id')->references('role')->on('users')->onDelete('cascade');
        });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::disableForeignKeyConstraints();

    Schema::dropIfExists('barangs');
    Schema::dropIfExists('ruangan');
    Schema::dropIfExists('bangunan');
    Schema::dropIfExists('tanah');
    Schema::dropIfExists('kategori');


    Schema::enableForeignKeyConstraints();
}

};
