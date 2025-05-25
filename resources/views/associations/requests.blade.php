@extends('associations.layout')
@section('content')
    <div class="az-content pd-y-20 pd-lg-y-30 pd-xl-y-40">
        <div class="container">

            <div class="az-content-body pd-lg-l-40 d-flex flex-column">



                <hr class="mg-y-30">

                <div class="az-dashboard-one-title">
                    <div>
                        <h2 class="az-dashboard-title"> متابعة الطلبات</h2>
                    </div>
                    <div class="az-content-header-right">


                        <a href="{{route('association.courses.add')}}" class="btn btn-az-primary btn-rounded">طلب جديد</a>
                    </div>
                </div>


                <div class="table-responsive">
                    <table class="table table-striped mg-b-0">
                        <thead>
                            <tr>
                                <th>تاريخ الطلب</th>
                                <th>عنوان الدورة</th>
                                <th>عدد المستفيدين </th>
                                <th>حالة الطلب</th>

                                {{-- <th>تعديل</th> --}}
                                <th>حذف</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($requests as $request)
                                <tr>
                                    <th scope="row">12 يناير 2025</th>
                                    <td><a href="asso_course-details.html"> {{$request->course->title}} </a> </td>
                                    <td>{{$request->beneficiaries->count()}} </td>
                                    <td> {{App\Models\CourseRequest::STATUS_SELECT[$request->status] ?? ''}}</td>


                                    {{-- <td><a href="#"> <i class="fa-solid fa-pen-to-square"></i></a>
                                    </td> --}}
                                    <td><a href="{{route('association.request.delete',$request->id)}}"> <i class="fa-solid fa-trash"></i></a></td>

                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div><!-- bd -->




            </div><!-- az-content-body -->
        </div><!-- container -->
    </div>
@endsection
