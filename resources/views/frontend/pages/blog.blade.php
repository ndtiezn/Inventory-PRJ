{{-- View này sẽ kế thừa giao diện từ `frontend.layouts.master` --}}
@extends('frontend.layouts.master')

{{-- Thay thế nội dung vào Placeholder `title` của view `frontend.layouts.master` --}}
@section('title')
Góp ý Shop trái cây Ngon Ngon - Freshfruit
@endsection

{{-- Thay thế nội dung vào Placeholder `custom-css` của view `frontend.layouts.master` --}}
@section('custom-css')
@endsection

{{-- Thay thế nội dung vào Placeholder `main-content` của view `frontend.layouts.master` --}}
@section('main-content')
<style>
.title{
    font-family: Poppins-Bold;
    text-align: center;
    color: Orange;
    margin-top: 20px;
    
}
.row{
    margin-top: 20px;
}
.btn{
    background-color: Blue;
    color: white;
    margin-left: 1000px;
    margin-top: 80px;
    margin-bottom: 40px;
}
.form-control1{
    display: block;
    width: 100%;
    padding: .5rem .75rem;
    font-size: 1rem;
    line-height: 4.25;
    color: #495057;
    background-color: #fff;
    background-image: none;
    background-clip: padding-box;
    border: 1px solid rgba(0,0,0,.15);
    border-radius: .25rem;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
}

</style>
<!-- Title page -->
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{ asset('themes/cozastore/images/bgTC-01.jpg') }}');">
    <h2 class="ltext-105 cl0 txt-center">
        {{ __('freshfruit.pages.blog') }}
    </h2>
</section>
<!-- Content page -->
<div class="container" ng-controller="blogController">
    <form name="blogForm" ng-submit="submitblogForm()" novalidate>
        <h1 class="title">{{ __('freshfruit.blogs.ttgy') }}</h1><br>
        <div class="alert alert-danger col-sm-6 col-sm-6" ng-show="blogForm.$invalid" style="margin-left: 400px;">
        <ul>
            <li><span class="error" ng-show="blogForm.kh_ma.$error.required">{{ __('freshfruit.blogs.ktten_kh') }}</span></li>
            <li><span class="error" ng-show="blogForm.kh_ma.$error.minlength">{{ __('freshfruit.blogs.ktten_khmin') }}</span></li>
            <li><span class="error" ng-show="blogForm.kh_ma.$error.maxlength">{{ __('freshfruit.blogs.ktten_khmax') }}</span> </li> 
            <li><span class="error" ng-show="blogForm.sp_ma.$error.required">{{ __('freshfruit.blogs.ktten_sp') }}</span></li>
            <li><span class="error" ng-show="blogForm.gy_noiDung.$error.required">{{ __('freshfruit.blogs.ktnd_gy') }}</span></li>
            <li><span class="error" ng-show="blogForm.gy_noiDung.$error.minlength">{{ __('freshfruit.blogs.minnd') }}</span></li>
            <li><span class="error" ng-show="blogForm.gy_noiDung.$error.maxlength">{{ __('freshfruit.blogs.maxnd') }}</span> </li> 
        </ul>
        </div>
        <div class="row">
                            <label for="kh_ma" class="col-sm-2" style="margin-left: 200px;"><b>{{ __('freshfruit.blogs.ten') }}</b></label>
                            <div class="col-sm-6">
                            <input type="text" class="form-control" id="kh_ma" name="kh_ma" ng-model="kh_ma" ng-minlength="6" ng-maxlength="100" ng-required=true>
                            </div>
        </div>
        <div class="row"> 
                            <label for="sp_ma" class="col-sm-2" style="margin-left: 200px;"><b>{{ __('freshfruit.blogs.spgopy') }}</b></label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="sp_ma" name="sp_ma" ng-model="sp_ma" ng-required=true>
                        </div>
        </div>
        <div class="row">
                            <label for="gy_noiDung" class="col-sm-2" style="margin-left: 200px;"><b>{{ __('freshfruit.blogs.ndgopy') }}</b></label>
                            <div class="col-sm-6">
                            <textarea class="form-control1" name="gy_noiDung" id="gy_noiDung" placeholder="{{ __('freshfruit.blogs.ndgopy1') }}" ng-model="gy_noiDung" ng-minlength="6" ng-maxlength="100" ng-required=true></textarea>
                            </div>
        </div>
        <!-- Nút submit form -->
            <button type="submit" class="btn"  ng-disabled="blogForm.$invalid">{{ __('freshfruit.blogs.goi_gy') }}</button>
    </form>
</div>
@endsection

{{-- Thay thế nội dung vào Placeholder `custom-scripts` của view `frontend.layouts.master` --}}
@section('custom-scripts')
<script>
    // Khai báo controller `contactController`
    app.controller('blogController', function($scope, $http) {
        // hàm submit form sau khi đã kiểm tra các ràng buộc (validate)
        $scope.submitblogForm = function() {
            // kiểm tra các ràng buộc là hợp lệ, gởi AJAX đến action 
            if ($scope.blogForm.$valid) {
                // lấy data của Form
                var dataInputblogForm_GopY = {
                    "kh_ma": $scope.blogForm.kh_ma.$viewValue,
                    "sp_ma": $scope.blogForm.sp_ma.$viewValue,
                    "gy_noiDung": $scope.blogForm.gy_noiDung.$viewValue,
                };
                var dataInputblogForm = {
                    "gopy": dataInputblogForm_GopY,
                    "_token": "{{ csrf_token() }}",
                };
                // sử dụng service $http của AngularJS để gởi request POST đến route `frontend.bog`
                $http({
                    url: "{{ route('frontend.infoblog') }}",
                    method: "POST",
                    data: JSON.stringify(dataInputblogForm)
                }).then(function successCallback(response) {
                    swal('Gởi góp ý thành công!', 'Chúng tôi cám ơn sự góp ý của quý khách!', 'success');
                }, function errorCallback(response) {
                    swal('Có lỗi trong quá trình gởi!', 'Vui lòng thử lại sau vài phút.', 'error');
                    console.log(response);
                });
            }
        };
    });
</script>
@endsection