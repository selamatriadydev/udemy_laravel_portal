@extends('front.layout.app')

@section('title', 'Previous Polls')

@section('main_content') 
<div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ HOME }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ OLD_RESULT }}</li>
        </ol>
    </nav>
</div>

@if ($poll_results)
<!-- News With Sidebar Start -->
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="bg-white p-4">
                    @foreach ($poll_results as $item)
                        @php
                            $total_vote = $item->yes_vote+$item->no_vote;
                            $total_yes_percentage = 0;
                            if($item->yes_vote > 0){
                                $total_yes_percentage = ($item->yes_vote*100)/$total_vote;
                                $total_yes_percentage = ceil($total_yes_percentage);
                            }
                            $total_no_percentage = 0;
                            if($item->no_vote > 0){
                                $total_no_percentage = ($item->no_vote*100)/$total_vote;
                                $total_no_percentage = ceil($total_no_percentage);
                            }
                            $updated_date = "";
                            if($item->created_at){
                                $ts = strtotime($item->created_at);
                                $updated_date = date('d F, Y', $ts);
                            }
                        @endphp
                        <table class="table">
                            <tbody>
                                    <tr style="background: #80808040;">
                                        <td colspan="2"><b>{{ $item->question }}</b></td>
                                    </tr>
                                    <tr style="background: #80808040;">
                                        <td colspan="2"><b>{{ POLL_DATE }}</b>: {{ $updated_date }}</td>
                                    </tr>
                                    <tr style="background: #80808040;">
                                        <td colspan="2"> <b>{{ TOTAL_VOTE }}</b>: {{ $total_vote }}</td>
                                    </tr>
                                    <tr>
                                        <td width="20%">{{ YES }} ({{ $item->yes_vote }})</td>                  
                                        <td>
                                            <div class="progress-bar bg-success" role="progressbar" style="width: {{ $total_yes_percentage }}%;" aria-valuenow="{{ $total_yes_percentage }}" aria-valuemin="0" aria-valuemax="100">{{ $total_yes_percentage }}%</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>{{ NO }} ({{ $item->no_vote }})</td>
                                        <td>
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $total_no_percentage }}%;" aria-valuenow="{{ $total_no_percentage }}" aria-valuemin="0" aria-valuemax="100">{{ $total_no_percentage }}%</div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                    @endforeach
                </div>
                <div class="bg-white p-4">
                    {!! $poll_results->links('vendor.pagination.bootstrap-4') !!}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- News With Sidebar End -->
    
@else
<!-- News With Sidebar Start -->
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- News Detail Start -->
                <div class="position-relative mb-3">
                    <div class="bg-white border border-top-0 p-4">
                        <h1 class="mb-3 text-secondary text-uppercase font-weight-bold">Not Found</h1>
                    </div>
                </div>
                <!-- News Detail End -->
            </div>

        </div>
    </div>
</div>
<!-- News With Sidebar End -->
    
@endif
@endsection
    
