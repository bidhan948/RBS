@extends('Layouts.main')
@section('title', 'Property List')
@section('setting_parent', 'menu-open')
@section('is_active_property', 'nav_bar_active')
@section('main_content')
    <div class="row">
        <div class="col-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <h5 class="text-center">Welcome {{ __('Property List') }}</h5>
                        </div>
                        <div class="col-6 text-right">
                            <a href="{{ route('property.create') }}" class="btn btn-primary">Add Property</a>
                        </div>
                        <div class="col-12 mt-1">
                            <table class="mb-0 table table-bordered">
                                <thead>
                                    <tr class="bg-primary text-white text-center">
                                        <th>S.No</th>
                                        <th>User Name</th>
                                        <th>E-mail</th>
                                        <th>Contact No.</th>
                                        <th>Address</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@section('scripts')
    <script type="text/javascript" src="{{ asset('vue/bundle.js') }}"></script>
    <script>
        new Vue({
            el: "#vue_app",
            data: {},
            methods: {

            },
            mounted() {
                let vm = this;
            }
        });
    </script>
@endsection
@endsection
