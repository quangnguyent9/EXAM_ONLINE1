@extends('admin.layout.index') 

@section('content') 


<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Câu hỏi
                    <small>Thêm</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">

                @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
                @endif  

                <form action="admin/cauhoi/them/{{$dethi->id}}" onsubmit="return validate()" method="POST" enctype="multipart/form-data">

                    <input type="hidden" name="_token" value="{{csrf_token()}}" />

                    <div class="form-group">
                        <label>Nội dung</label>
                        <textarea class="form-control ckeditor" name="noi_dung" id="noi_dung"></textarea>
                        @if ($errors->has('noi_dung'))
                        <div class="alert alert-danger" style="width: 755px; height: 40px; margin-top: 5px; ">{{ $errors->first('noi_dung') }}</div>
                        @endif                                
                    </div>  
                    <div class="form-group">
                        <label>Hình ảnh</label>
                        <input type="file" name="hinh_anh" id="hinh_anh" class="form-control"/>

                        @if(session('loihinhanh'))
                        <div class="alert alert-danger">
                            {{session('loihinhanh')}}
                        </div>
                        @endif  
                    </div>

                    <div class="form-group">
                        <label>Phương án A</label>
                        <input class="form-control" name="phuong_an_a" id="phuong_an_a" placeholder="Hãy nhập phương án A" />
                        @if ($errors->has('phuong_an_a'))
                        <div class="alert alert-danger" style="width: 755px; height: 40px; margin-top: 5px; ">{{ $errors->first('phuong_an_a') }}</div>
                        @endif   
                    </div>

                    <div class="form-group">
                        <label>Phương án B</label>
                        <input class="form-control" name="phuong_an_b" id="phuong_an_b" placeholder="Hãy nhập phương án B" />
                        @if ($errors->has('phuong_an_b'))
                        <div class="alert alert-danger" style="width: 755px; height: 40px; margin-top: 5px; ">{{ $errors->first('phuong_an_b') }}</div>
                        @endif 
                    </div>

                    <div class="form-group">
                        <label>Phương án C</label>
                        <input class="form-control" name="phuong_an_c" id="phuong_an_c" placeholder="Hãy nhập phương án C" />
                        @if ($errors->has('phuong_an_c'))
                        <div class="alert alert-danger" style="width: 755px; height: 40px; margin-top: 5px; ">{{ $errors->first('phuong_an_c') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Phương án D</label>
                        <input class="form-control" name="phuong_an_d" id="phuong_an_d" placeholder="Hãy nhập phương án D" />
                        @if ($errors->has('phuong_an_d'))
                        <div class="alert alert-danger" style="width: 755px; height: 40px; margin-top: 5px; ">{{ $errors->first('phuong_an_d') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Phương án E</label>
                        <input class="form-control" name="phuong_an_e" id="phuong_an_e" placeholder="Hãy nhập phương án E" />
                        @if ($errors->has('phuong_an_e'))
                        <div class="alert alert-danger" style="width: 755px; height: 40px; margin-top: 5px; ">{{ $errors->first('phuong_an_e') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Độ khó</label>
                        <label>
                            <input type="radio" name="do_kho" value="Dễ">Dễ 
                        </label>
                        <label>
                            <input type="radio" name="do_kho" value="Trung bình">Trung bình
                        </label>
                        <label>
                            <input type="radio" name="do_kho" value="Khó">Khó
                        </label>
                    </div>

                    <div class="form-group">
                        <label>Đáp án</label>
                        <input class="form-control" name="dap_an" id="dap_an" placeholder="Hãy nhập đán án" />
                        @if ($errors->has('dap_an'))
                        <div class="alert alert-danger" style="width: 755px; height: 40px; margin-top: 5px; ">{{ $errors->first('dap_an') }}</div>
                        @endif

                        @if(session('loidapan'))
                        <div class="alert alert-danger">
                            {{session('loidapan')}}
                        </div>
                        @endif  
                    </div>

                    <a href="admin/dethi/chitiet/{{$dethi->id}}" class="btn btn-danger">Trở lại</a>
                    <button type="submit" class="btn btn-success">Tạo mới</button>                       

                    <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

        @endsection

        @section('script')
        <script type="text/javascript">
            $(document).ready(function() {
                $('#monhoc').change(function() {
                    var id_monhoc = $(this).val();
                    $.get("admin/ajax/dethi/"+id_monhoc, function(data) {
                        $("#dethi").html(data);
                    });
                });
            });
        </script>
        @endsection