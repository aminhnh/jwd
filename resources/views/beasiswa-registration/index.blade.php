<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __('Pilihan Beasiswa') }}
		</h2>
	</x-slot>

	<div class="py-12">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

				@if (session('error'))
				<div class="bg-red-500 text-white p-4 rounded">
					{{ session('error') }}
				</div>
				@endif

				@if(session('success'))
				<div class="bg-green-500 text-white p-4 rounded mt-3">
					{{ session('success') }}
				</div>
				@endif

				<div class="p-6 text-gray-900">


					<h1 class="text-2xl font-bold mb-6">Beasiswa Akademik</h1>
					<p class="mb-4">
						Beasiswa Akademik diberikan kepada mahasiswa yang menunjukkan prestasi akademik yang tinggi.
						Kriteria untuk mengajukan beasiswa ini adalah sebagai berikut:
					</p>
					<ul class="list-disc list-inside mb-6">
						<li>IPK minimal 3.0</li>
						<li>Aktif dalam organisasi kemahasiswaan</li>
						<li>Melampirkan surat rekomendasi dari dosen</li>
						<li>Melengkapi dokumen pendaftaran dengan benar</li>
					</ul>

					<h1 class="text-2xl font-bold mb-6">Beasiswa Non-Akademik</h1>
					<p class="mb-4">
						Beasiswa Non-Akademik ditujukan untuk mahasiswa yang aktif dalam kegiatan non-akademik,
						seperti olahraga, seni, dan kegiatan sosial. Kriteria untuk beasiswa ini meliputi:
					</p>
					<ul class="list-disc list-inside mb-6">
						<li>Pengalaman dalam organisasi atau komunitas</li>
						<li>Menunjukkan prestasi di bidang olahraga atau seni</li>
						<li>Melampirkan bukti kegiatan non-akademik</li>
						<li>IPK minimal 2.5</li>
					</ul>

					<p class="text-sm text-gray-600">
						Pastikan semua syarat dan ketentuan dipenuhi sebelum mengajukan permohonan beasiswa. Jika
						ada
						pertanyaan lebih lanjut, jangan ragu untuk menghubungi kami.
					</p>

				</div>
			</div>
		</div>
	</div>
</x-app-layout>