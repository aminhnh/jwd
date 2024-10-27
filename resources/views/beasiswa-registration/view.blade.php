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
				<div class="bg-red-500 text-white p-4 rounded-md">
					{{ $error }}
				</div>
				@else
				<div class="p-6 text-gray-900">
					<h1 class="text-3xl font-bold mb-6 border-b-2 border-gray-200 pb-2">Detail Pendaftaran</h1>
					<div class="space-y-4">
						<div class="flex justify-between">
							<span class="font-semibold">Nama:</span>
							<span>{{ $registration->name }}</span>
						</div>
						<div class="flex justify-between">
							<span class="font-semibold">Email:</span>
							<span>{{ $registration->email }}</span>
						</div>
						<div class="flex justify-between">
							<span class="font-semibold">Nomor HP:</span>
							<span>{{ $registration->phone_number }}</span>
						</div>
						<div class="flex justify-between">
							<span class="font-semibold">Semester:</span>
							<span>{{ $registration->semester }}</span>
						</div>
						<div class="flex justify-between">
							<span class="font-semibold">IPK:</span>
							<span>{{ $registration->ipk }}</span>
						</div>
						<div class="flex justify-between">
							<span class="font-semibold">Jenis Beasiswa:</span>
							<span>{{ $registration->jenis_pilihan_beasiswa }}</span>
						</div>
						<div class="flex justify-between">
							<span class="font-semibold">Status:</span>
							<span>
								@if ($registration->status_ajuan === 'belum diverifikasi')
								<span
									class="inline-block bg-yellow-400 text-white text-xs font-bold px-2 py-1 rounded-full">Belum
									Diverifikasi</span>
								@else
								<span>{{ $registration->status_ajuan }}</span>
								@endif
							</span>
						</div>
						<div class="flex justify-between">
							<span class="font-semibold">File:</span>
							<span>
								<a href="{{ route('file.show', ['fileName' => basename($registration->file_path)]) }}"
									class="text-blue-600 hover:underline">
									Lihat Berkas
								</a>
							</span>
						</div>
					</div>
				</div>
				@endif
			</div>
		</div>
	</div>
</x-app-layout>