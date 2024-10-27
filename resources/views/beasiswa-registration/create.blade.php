<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __('Registrasi Beasiswa') }}
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
					<div class="p-6 rounded-lg">
						<h1 class="text-2xl font-bold mb-6">Formulir Registrasi Beasiswa</h1>

						<form action="{{ route('beasiswa-registrations.store') }}" method="POST"
							enctype="multipart/form-data" id="beasiswaForm">
							@csrf

							<!-- Dropdown for Jenis Beasiswa -->
							<div class="mb-4">
								<label for="jenis_pilihan_beasiswa"
									class="block text-sm font-medium text-gray-700">Jenis
									Beasiswa:</label>
								<select id="jenis_pilihan_beasiswa" name="jenis_pilihan_beasiswa"
									class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500">
									<option value="" disabled hidden>Pilih jenis beasiswa</option>
									<option value="akademik">Beasiswa Akademik</option>
									<option value="non_akademik">Beasiswa Non-Akademik</option>
								</select>
								@error('jenis_pilihan_beasiswa')
								<p class="mt-1 text-red-600 text-sm">{{ $message }}</p>
								@enderror
							</div>

							<!-- Name Field -->
							<div class="mb-4">
								<label for="name" class="block text-sm font-medium text-gray-700">Nama:</label>
								<input type="text" id="name" name="name"
									class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500"
									required value="{{ old('name') }}">
								@error('name')
								<p class="mt-1 text-red-600 text-sm">{{ $message }}</p>
								@enderror
							</div>

							<!-- Email Field -->
							<div class="mb-4">
								<label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
								<input type="email" id="email" name="email"
									class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500"
									required value="{{ old('email') }}">
								@error('email')
								<p class="mt-1 text-red-600 text-sm">{{ $message }}</p>
								@enderror
							</div>

							<!-- Phone Number Field -->
							<div class="mb-4">
								<label for="phone_number" class="block text-sm font-medium text-gray-700">Nomor
									HP:</label>
								<input type="text" id="phone_number" name="phone_number"
									class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500"
									required value="{{ old('phone_number') }}" pattern="\d*">
								@error('phone_number')
								<p class="mt-1 text-red-600 text-sm">{{ $message }}</p>
								@enderror
							</div>

							<!-- Semester Selection -->
							<div class="mb-4">
								<label for="semester" class="block text-sm font-medium text-gray-700">Semester Saat
									Ini:</label>
								<select id="semester" name="semester"
									class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500"
									required>
									<option value="" disabled hidden>Pilih Semester</option>
									@for ($i = 1; $i <= 8; $i++) <option value="{{ $i }}">{{ $i }}</option>
										@endfor
								</select>
							</div>

							<!-- IPK Field (Read-only) -->
							<div class="mb-4">
								<label for="ipk" class="block text-sm font-medium text-gray-700">IPK:</label>
								<input type="text" id="ipk" name="ipk"
									class="mt-1 block w-full p-2 border border-gray-300 rounded-md bg-gray-200 cursor-not-allowed"
									value="{{ old('ipk', 3.4) }}" readonly>
							</div>

							<!-- File Upload -->
							<div class="mb-4">
								<label for="file" class="block text-sm font-medium text-gray-700">Upload Berkas:</label>
								<input type="file" id="file" name="file"
									class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500"
									accept=".pdf,.jpg,.jpeg,.zip" required>
								@error('file')
								<p class="mt-1 text-red-600 text-sm">{{ $message }}</p>
								@enderror
							</div>

							<!-- Submit Button -->
							<button type="submit"
								class="w-full bg-blue-600 text-white p-2 rounded-md hover:bg-blue-700 transition duration-200"
								id="submitBtn">Daftar</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script>
	document.addEventListener('DOMContentLoaded', function() {
		// Simulate IPK value
		const ipkValue = 3.4; // You can change this value to test
		document.getElementById('ipk').value = ipkValue;

		const jenisBeasiswaSelect = document.getElementById('jenis_beasiswa');
		const submitBtn = document.getElementById('submitBtn');

		// Disable options based on IPK value
		if (ipkValue < 3) {
			jenisBeasiswaSelect.disabled = true;
			submitBtn.disabled = true;
		} else {
			jenisBeasiswaSelect.focus();
		}
	});
	</script>
</x-app-layout>