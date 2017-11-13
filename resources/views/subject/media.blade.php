@if(!empty($media))
    @foreach($media as $medium)
        <div class="row m-0">
             <div class="col-md-4 ml-xl-0 px-0">
                 <select class="form-control" name="medium_types[]">
                     @foreach($medium_types as $medium_type)
                         <option value="{{ $medium_type->id }}" {{ $medium->medium_type_id === $medium_type->id ? 'selected' : '' }}>{{ $medium_type->description }}</option>
                     @endforeach
                 </select>
             </div>
             <div class="col-md-8 mr-0 px-0 input-group">
                 <input type="text" class="form-control" style="width:calc(100% - 40px)" name="medium_values[]" value="{{ $medium->value }}">
                 <button class="btn btn-warning" onclick="return removeRow(this)">
                     <i class="fa fa-trash"></i>
                 </button>
             </div>
         </div>
    @endforeach
@endif
<div class="row m-0" id="button-row">
    <div class="col-md-12 px-0">
        <button type="button" class="btn btn-primary w-100" id="btnCreateMedium">
            <i class="fa fa-plus"></i>
            Add
        </button>
    </div>
</div>