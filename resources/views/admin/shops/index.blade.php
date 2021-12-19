@extends('admin.layouts.master')


@section('title')
shops
@endsection



@section('header-content')

    <section class="content-header">
        <h1>
           shops
            <small>Display shops</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin')}}"><i class="fa fa-dashboard"></i> {{trans('admin.home')}}</a></li>
            <li class="active">Display shops</li>
        </ol>
    </section>

@endsection


@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <!-- /.box-header -->

                    <div class="box-body">

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th> #</th>
                                <th>Name</th>
                                <th>Logo</th>
                                <th>Controll</th>
                            </tr>
                            </thead>
                            <tbody>

                            @forelse($items as $key=>$item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item->translate('en')->name}}</td>
                                    <td><img width="100px" src="{!! Helper::loadFile('Shops/' . ($item->logo_image != null ?  $item->logo_image : 'filler.svg')) !!}"/></td>
                                    <td>
                                        <form action="{{route('admin.shops.destroy',$item)}}" method="post">

                                            <a href="{{route('admin.shops.edit',$item)}}"
                                               class="btn btn-primary btn-circle"><i class="fa fa-edit"></i></a>
                                            @csrf
                                            @method("delete")
                                            <button type="submit" name="delete" onclick="return confirm('Are You Sure ?');" class="btn btn-danger btn-circle"><i class="fa fa-trash"></i></button>
                                        </form>

                                    </td>
                                </tr>
                            @empty

                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>

            </div>
        </div>
    </section>


@endsection



@section('script')

    <script type="text/javascript">

        $('#checkbtn').vSwitch({theme: 'blue'});
        $('.checkbtnC').vSwitch({theme: 'blue'});
    </script>



@endsection


