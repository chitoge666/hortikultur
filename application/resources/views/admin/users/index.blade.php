@extends('layouts.app')

@section('namapage')
List Users
@endsection

@section('content')
    @if(Session::has('alert'))
     
        <script type='text/javascript'>
            $(document).ready(function() {
                $.toast({
                    heading: 'Proses Berhasil',
                    text: '{{ Session::get('alert')}}.',
                    position: 'top-right',
                    loaderBg: '#ff6849',
                    icon: 'info',
                    hideAfter: 11000,

                    stack: 6
                })
            });
        </script>

        <!-- <div class="alert alert-success">
          {{ Session::get('alert')}}
        </div> -->
        @endif
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <a href="{{ asset('admin/users/create') }}"><button type="" class="btn btn-success waves-effect waves-light m-r-10"><i class="fa fa-plus"></i> Add Users</button></a>
                <p class="text-muted m-b-30"></p>
                <div class="table-responsive">
                    <table id="example23" class="table table-striped">
                        <thead>
                            <tr>
                                <th width="30">No</th>
                                <th>Email</th>
                                <th>Nama Petani</th>
                                <th>Alamat</th>
                                <th>Nomor Hp</th>
                                <!-- <th>Nomor Device</th> -->
                                <th width="60">Actions</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no =1;
                                
                            @endphp

                            @if(count($users) > 0)
                            @foreach($users as $u)

                            
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $u->email }}</td>
                                <td>{{ $u->petani->nama_petani }}</td>
                                <td>{{ $u->petani->alamat }}</td>
                                <td>{{ $u->petani->no_hp }}</td>
                                <td>
                                <form id="hapus" action="{{ route('users.destroy', $u->id_user) }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                </form>
                                    <!-- <a href="#" data-toggle="tooltip" data-original-title="View"> <i class="fa fa-search text-inverse m-r-10"></i> </a> -->
                                    <!-- <a href="{{ route('users.edit', $u->id_user) }}" data-toggle="tooltip" data-original-title="Edit Aseli"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a> -->
                                    <a href="{{ route('users.edit', $u->id_user) }}" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                    {{--
                                    <a href="{{ route('users.destroy', $u->id_user) }}" 
                                        class="hapus" data-toggle="tooltip" data-original-title="Delete" 
                                        onclick="event.preventDefault(); document.getElementById('hapus').submit();"> 
                                        <i class="fa fa-close text-danger"></i>
                                    </a>
                                    --}}
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
 
@endsection