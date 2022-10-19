<div class="card card-primary">
    <div class="card-header">
    <h3 class="card-title">Advertisement Home Header</h3>

    <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
        <i class="fas fa-minus"></i>
        </button>
    </div>
    </div>
    <div class="card-body">
        <form action="{{ route('admin_home_ad_header_update') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="photos_show"> {{ $home_ad_data_header && $home_ad_data_header->above_ad ?  'Exists Photo' :  'Example Photo' }}</label><br>
                <img class="img-fluid" id="photos_show" src="{{ $home_ad_data_header && $home_ad_data_header->above_ad ?  asset('upload/advertisement/'.$home_ad_data_header->above_ad) :  asset('upload/advertisement/ads-728x90.png') }}" alt="Photo" >
            </div>
            <div class="form-group">
                <label for="above_ad_header">Change Photo</label>
                <input type="file" class="form-control @error('above_ad_header') is-invalid @enderror" id="above_ad_header" name="above_ad_header" placeholder="Photo">
                <span class="text-danger">Size : 728x90</span>
            </div>
            <div class="form-group">
                <label for="above_ad_url_header">URL</label>
                <input type="text" class="form-control" id="above_ad_url_header" name="above_ad_url_header" value="{{ $home_ad_data_header ? $home_ad_data_header->above_ad_url : '' }}" placeholder="abc.com">
            </div>

            <div class="form-group">
                <label for="above_ad_status_header">Status</label> <br>
                <input type="checkbox" name="above_ad_status_header"  data-bootstrap-switch data-off-color="danger" value="1"
                data-on-color="success" data-on-text="Show" data-off-text="Hide" {{ $home_ad_data_header && $home_ad_data_header->above_ad_status =='Show' ? 'checked' : '' }}>
            </div>
            <button class="btn btn-primary" type="submit">Simpan</button>
        </form>
    </div>
    <!-- /.card-body -->
    {{-- <div class="overlay">
        <i class="fas fa-2x fa-sync-alt"></i>
    </div> --}}
</div>