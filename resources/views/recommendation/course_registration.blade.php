@extends('layouts.master')

    @section('content-wrapper')
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Available Courses</h3>
            </div>
        {!! Form::open(['method'=>'POST', 'action'=>['RecommendationController@store']]) !!}
           
            @if($coreCourses)
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="dataTables_length" id="example1_length">
                                <label>Core Courses</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="courses" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="courses_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting" tabindex="0" aria-controls="courses" rowspan="1" colspan="1" aria-label=""></th>
                                        <th class="sorting" tabindex="0" aria-controls="courses" rowspan="1" colspan="1" aria-label="">S/N</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="courses" rowspan="1" colspan="1" aria-sort="ascending" aria-label="">Course Code</th>
                                        <th class="sorting" tabindex="0" aria-controls="courses" rowspan="1" colspan="1" aria-label="">Course Title</th>
                                        <th class="sorting" tabindex="0" aria-controls="courses" rowspan="1" colspan="1" aria-label="">Prerequisite</th>
                                        <th class="sorting" tabindex="0" aria-controls="courses" rowspan="1" colspan="1" aria-label="">Unit(s)</th>
                                        <th class="sorting" tabindex="0" aria-controls="courses" rowspan="1" colspan="1" aria-label="">select</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($coreCourses as $course)
                                        @if(Auth::user()->option_id == $course->option_id || $course->option_id == 4 || $interpolate == $course->option_id)
                                            
                                            <tr role="row" class="odd" data-id="{{$course->id}}">
                                                <td></td>
                                                <td>{{$sn ++}}</td>
                                                <td>{{$course->course_code}}</td>
                                                <td>{{$course->course_title}}</td>
                                                <td>{{$course->prerequisite}}</td>
                                                <td>{{$course->unit}}</td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        {!! Form::checkbox($course->course_code, $course->id, true) !!}
                                                    </div>
                                                    
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif
            @if(count($restrictedElectives))
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="dataTables_length" id="example1_length">
                                <label>Restricted Electives</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="courses" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="courses_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting" tabindex="0" aria-controls="courses" rowspan="1" colspan="1" aria-label="">S/N</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="courses" rowspan="1" colspan="1" aria-sort="ascending" aria-label="">Course Code</th>
                                        <th class="sorting" tabindex="0" aria-controls="courses" rowspan="1" colspan="1" aria-label="">Course Title</th>
                                        <th class="sorting" tabindex="0" aria-controls="courses" rowspan="1" colspan="1" aria-label="">Unit(s)</th>
                                    </tr>
                                </thead>
                                <tbody {{$sn = 1}}>
                                    
                                        @foreach ($restrictedElectives as $restricted)
                                            @if(Auth::user()->option_id == $restricted->option_id || $interpolate == $restricted->option_id || $course->option_id == 4)
                                                    <tr role="row" class="odd 
                                                    {{$sn == 1 ? 'alert-success' : ''}}">
                                                    <td>{{$sn ++}}</td>
                                                    <td>{{$restricted->course_code}}</td>
                                                    <td>{{$restricted->course_title}}</td>
                                                    <td>{{$restricted->unit}}</td>
                                                </tr>
                                            @endif
                                        @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif()
            
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="dataTables_length" id="example1_length">
                            <label>Special Electives</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table id="courses" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="courses_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting" tabindex="0" aria-controls="courses" rowspan="1" colspan="1" aria-label="">S/N</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="courses" rowspan="1" colspan="1" aria-sort="ascending" aria-label="">Course Code</th>
                                    <th class="sorting" tabindex="0" aria-controls="courses" rowspan="1" colspan="1" aria-label="">Unit(s)</th>
                                    <th class="sorting" tabindex="0" aria-controls="courses" rowspan="1" colspan="1" aria-label="">Recommendation Level</th>
                                </tr>
                            </thead>
                            <tbody {{$sn = 1}}>
                                
                                    @foreach ($courses as $elective)
                                        @if($semester == 1)
                                            @if(substr($elective->course_code, -1) == 1 || substr($elective->course_code, -1) == 3)  
                                                <tr role="row" class="odd">
                                                    <td>{{$sn ++}}</td>
                                                    <td>{{$elective->course_code}}</td>
                                                    <td>{{$elective->features->unit}}</td>
                                                    <td>
                                                        <div class="progress progress-xs">
                                                            <div class="progress-bar bg-success" style="width: {{round($elective->similarity * 100, 1)}}%"></div>
                                                        </div>
                                                    </td>
                                                    {{-- @if($sn==3)
                                                        @break
                                                    @endif --}}
                                                </tr>
                                            @endif
                                        @elseif($semester == 2 && $level != 4)
                                            @if(substr($elective->course_code, -1) == 2 || substr($elective->course_code, -1) == 4)
                                                <tr role="row" class="odd">
                                                    <td>{{$sn ++}}</td>
                                                    <td>{{$elective->course_code}}</td>
                                                    <td>{{$elective->features->unit}}</td>
                                                    <td>
                                                        <div class="progress progress-xs">
                                                            <div class="progress-bar bg-success" style="width:{{round($elective->similarity * 100, 1)}}%"></div>
                                                        </div>
                                                    </td>
                                                    {{-- @if($sn==5)
                                                        @break
                                                    @endif --}}
                                                </tr>
                                            @endif
                                        @endif
                                    @endforeach
                            </tbody>
                            
                        </table>
                    </div>
                </div>
            </div>
                <div class="form-group float-right">
                    {!! Form::submit('Register', ['class'=>'btn btn-info btn-lg', 'id'=>'button']) !!}
                </div>
            {!! Form::close() !!}
        </div>
        
    @stop
    

    @section('scripts')
        
        $(document).ready(function() {
            var table = $('table').DataTable( {
                "order": [],
                'language': {
                    'lengthMenu': '_MENU_ records per page',
                    "info":      'Showing _START_ - _END_ (_TOTAL_)',
                    "search":  'Search',
                    'paginate': {
                            'previous': 'Previous',
                            'next': 'Next'
                    }
                },
                'columnDefs': [
                    {
                        "orderable": false,
                        'targets': [0, 3]
                    },
                    {
                        'checkboxes': {
                        'selectRow': true
                        },
                        'targets': 0
                    },
                ],
                'select': { style: 'multi',  selector: 'td:first-child'},
                'lengthMenu': [[10, 25, 50, -1], [10, 25, 50, "All"]],
                dom: '<"row"lfB>rtip',
                buttons: [
                    {
                        extend: 'pdf',
                        text: 'PDF',
                        exportOptions: {
                            columns: ':visible:Not(.not-exported)',
                            rows: ':visible'
                        },
                    },
                    {
                        extend: 'csv',
                        text: 'CSV',
                        exportOptions: {
                            columns: ':visible:Not(.not-exported)',
                            rows: ':visible'
                        },
                    },
                    {
                        extend: 'print',
                        text: 'print',
                        exportOptions: {
                            columns: ':visible:Not(.not-exported)',
                            rows: ':visible'
                        },
                    },
                    {
                        extend: 'colvis',
                        text: 'Column Visibility',
                        columns: ':gt(0)'
                    },
                ],
            } );

        });

    
   

    @stop
    
                            {{-- <tfoot>
                                <tr>
                                    <th rowspan="1" colspan="1"></th>
                                    <th rowspan="1" colspan="1"></th>
                                    <th rowspan="1" colspan="1" class="text-right">Total Units:</th>
                                    <th rowspan="1" colspan="1">0</th>
                                </tr>
                            </tfoot> --}}