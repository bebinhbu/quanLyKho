@extends('layouts.app')
@section('content')
    <section id="main-content">
        <section class="wrapper site-min-height">
            <!-- page start-->
            <section class="panel">
                <header class="panel-heading">
                    <h2 class="text-center">Providers</h2>
                </header>
                @if(Session::has('success'))
                    <div class="alert alert-block alert-info fade in">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ Session::get('success') }}</strong>
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-block alert-danger fade in">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        @foreach($errors->all() as $message)
                            <strong>{{ $message }}</strong><br>
                        @endforeach
                    </div>
                @endif
                <div class="panel-body">
                    <div class="adv-table editable-table ">
                        <div class="clearfix">
                            <div class="btn-group">
                                <a class="btn btn-success" data-toggle="modal" href="#myModal4">
                                    <i class="fa fa-plus"></i>
                                </a>
                            </div>
                            <div class="btn-group pull-right">
                                <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i
                                            class="fa fa-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="#">Print</a></li>
                                    <li><a href="#">Save as PDF</a></li>
                                    <li><a href="#">Export to Excel</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="space15"></div>
                        <table class="table table-striped table-hover table-bordered" id="editable-sample">
                            <thead>
                            <tr>
                                <th>
                                    <button type="submit" name="bulk_delete" id="bulk_delete" data-url="{{route('deleteEmployeeChecked')}}" class="btn btn-danger btn-xs">
                                        <i class="fa fa-eraser"></i>
                                    </button>
                                </th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($lists as $value)
                                <tr>
                                    <td>
                                        <input type="checkbox" name="checkList[]" class="checkboxes" value="{{ $value->id }}" />
                                    </td>
                                    <td class="id_pro">{{ $value->id }}</td>
                                    <td><input type="text" class="name_pro" value="{{ $value->name }}"></td>
                                    <td>
                                        <textarea class="address_pro"> {{$value->address}} </textarea>
                                    </td>
                                    <td class="center"><input type="string" class="phone_pro"
                                                              value="{{ $value->phone }}"></td>
                                    <td>
                                        <a class="btn btn-sm btn-info btnEditPro"
                                           data-url="{{route('updateProvider')}}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-danger btnDeletePro" href="">
                                            <i class="fa fa-minus"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
            <!-- page end-->
        </section>
    </section>
    <div class="modal fade modal-dialog-center " id="myModal4" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content-wrap">
                <div class="modal-content">
                    <form class="form-horizontal" action="{{ route('insertProvider') }}" method="POST" role="form">
                        {{csrf_field()}}
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;
                            </button>
                            <h4 class="modal-title">Insert Provider New</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="col-lg-3 col-sm-3 control-label">Name</label>
                                <div class="col-lg-9">
                                    <div class="iconic-input right">
                                        <i class="fa fa-users"></i>
                                        <input type="text" class="form-control" placeholder="Full name" value="{{old('name')}}" name="name"
                                               id="name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 col-sm-3 control-label">Address</label>
                                <div class="col-lg-9">
                                    <textarea name="address" class="form-control" required>{{old('address')}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 col-sm-3 control-label">Phone</label>
                                <div class="col-lg-9">
                                    <div class="iconic-input right">
                                        <i class="fa fa-phone"></i>
                                        <input type="number" class="form-control" value="{{ old('phone') }}" name="phone" id="phone"
                                               placeholder="Phone" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                            <button class="btn btn-warning" type="submit"> Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/jquery-ui-1.9.2.custom.min.js') }}"></script>
    <script src="{{ asset('js/jquery-migrate-1.2.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/data-tables/jquery.dataTables.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/data-tables/DT_bootstrap.js') }}"></script>
    <script src="{{ asset('js/editable-table.js') }}"></script>
    <script>
        jQuery(document).ready(function () {
            EditableTable.init();
        });
    </script>
@endsection