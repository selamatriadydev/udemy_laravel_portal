<div class="card card-primary">
    <div class="card-header">
    <h3 class="card-title">Advertisement</h3> 

    <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
        <i class="fas fa-minus"></i>
        </button>
    </div>
    </div>
    <div class="card-body">
        <table class="table table-striped table-valign-middle">
            <thead>
            <tr>
              <th>Photo</th>
              <th>Url</th>
              <th>Posisi</th>
              <th>Status</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($data_ad as $item)
                    <tr>
                        <td>
                            @if ($item->above_ad)
                                <img src="{{ asset('upload/advertisement/'.$item->above_ad) }}" alt="Product 1" class="img-fluid img-size-100 mr-2">
                            @endif
                        </td>
                        <td>
                            @if ($item->above_ad_url) 
                                <a href="{{ $item->above_ad_url }}" class="text-muted"><i class="fas fa-search"></i> </a>
                            @endif
                        </td>
                        <td>
                            @switch($item->above_ad_position)
                                @case('header')
                                    Top Navigasi
                                    @break
                                @case('sidebar')
                                    Sidebar
                                    @break
                                @case('home-bottom')
                                    Bottom Home 
                                    @break
                                @default
                                    Top Home
                            @endswitch
                        </td>
                        <td><span class="badge bg-{{ $item->above_ad_status =='Show' ? 'success' : 'danger' }}">{{ $item->above_ad_status }}</span></td>
                    </tr>
                @endforeach
            </tbody>
          </table>
    </div>
    <!-- /.card-body -->
    {{-- <div class="overlay">
        <i class="fas fa-2x fa-sync-alt"></i>
    </div> --}}
    <div class="card-footer clearfix">
        {!! $data_ad->links('vendor.pagination.bootstrap-4') !!}
      </div>
</div>