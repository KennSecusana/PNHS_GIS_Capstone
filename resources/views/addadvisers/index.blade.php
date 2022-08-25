@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @if (session('status'))
                <h6 class="alert alert-success"style="position: relative; margin-top:4%;">
                  {{session('status')}}
                </h6>
                @endif
     <div class="container " style="position: relative; margin-top:3%;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header elevation-2">
                        <h4 style="position: absolute; left:38%; color:dimgray;">Senior High Advisers</h4>
                        <a href="{{url('add-adviser')}}" class="btn btn-info float-start" >Register Adviser</a>
                    </div>
                    <div class="card-body">

                       <table class="table table-hover bg-light table-sm elevation-2" style="margin:auto;">

                           <thead class="bg-info rounded">
                               <tr>
                                  
                                   <th style="text-align: center">Profile Image</th>
                                   <th style="text-align: center">Role</th>
                                   <th style="text-align: center">Name</th>
                                   <th class="d-none d-md-table-cell d-lg-table-cell d-lg-table-cell" style="text-align: center">Username</th>
                                   <th class="d-none d-md-table-cell d-lg-table-cell d-xl-table-cell" style="text-align: center">Advisory</th>
                                   <th style="text-align: center">Edit</th>
                                   <th style="text-align: center">Delete</th>
                                   <th style="text-align: center">View</th>
                               </tr>
                           </thead>

                           <tbody>
                               @foreach ($user as $item)
                               <tr class="text-center" >
                                   
                                   <td><img src="{{asset('images/avatars/'.$item->avatar )}} " width="50px" height="50px" alt="Image" style="border-radius: 50%"></td>
                                   <td>{{$item->usertype}}</td>
                                   <td>{{$item->name}}</td>
                                   <td class="d-none d-md-table-cell d-lg-table-cell d-xl-table-cell">{{$item->username}}</td>
                                   <td class="d-none d-md-table-cell d-lg-table-cell d-xl-table-cell">{{$item->advisory}}</td>
                                   <td><a href="{{url('edit-adviser/' .$item->id)}}" class="btn btn-warning btn-xs "><i class="fas fa-edit"></i></a></td>
                                   <td><a href="{{url('delete-adviser/'.$item->id)}}" class="btn btn-danger btn-xs "><i class="fas fa-trash"></i></a></td>
                                   <td><a href="{{url('show-adviser/'.$item->id)}}" class="btn btn-success btn-xs"><i class="fas fa-eye"></i></a></td>
                               </tr>
                               @endforeach
                           </tbody>

                       </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
</div>
@endsection
