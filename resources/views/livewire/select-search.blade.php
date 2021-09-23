<div class="col-span-6 sm:col-span-4">
    <label for="last-name" class="block text-sm font-medium text-gray-700">Patient</label>  
    <div wire:ignore>
        <select class="w-full border bg-white rounded px-3 py-2 outline-none" name="patient_id" id="select2" >
            <option value="">-- Select Patient --</option>
            @isset($patients)
                @foreach($patients as $patient)
                  <option class="py-1" value="{{ $patient->id }}">{{ $patient->name }}</option> 
                @endforeach
            @endisset
        </select>
    </div>
</div> 
@push('scripts')
<script>
    $(document).ready(function() {
        $('#select2').select2();
        $('#select2').on('change', function (e) {
            var data = $('#select2').select2("val");
            @this.set('selPatient', data);
        });
    });
</script>
@endpush