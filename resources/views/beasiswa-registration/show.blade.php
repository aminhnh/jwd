<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __('Detail Pendaftaran Beasiswa') }}
		</h2>
	</x-slot>

	<div class="py-12">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

				@if ($error)
				<div class="bg-red-500 text-white p-4 rounded">
					{{ $error }}
				</div>
				@else
				<div class="p-6 text-gray-900">
					<h1 class="text-2xl font-bold mb-6">Detail Pendaftaran</h1>
					<p><strong>Nama:</strong> {{ $registration->name }}</p>
					<p><strong>Email:</strong> {{ $registration->email }}</p>
					<p><strong>Nomor HP:</strong> {{ $registration->phone_number }}</p>
					<p><strong>Semester:</strong> {{ $registration->semester }}</p>
					<p><strong>IPK:</strong> {{ $registration->ipk }}</p>
					<p><strong>Jenis Beasiswa:</strong> {{ $registration->jenis_beasiswa }}</p>
					<p><strong>Status:</strong> {{ $registration->status_ajuan }}</p>
					<p><strong>File:</strong> <a href="{{ asset($registration->file_path) }}" target="_blank">Lihat
							Berkas</a></p>
				</div>
				@endif

			</div>
		</div>
	</div>
</x-app-layout>