@extends('Layouts.main')
@section('title', 'Dashboard')
@section('admin_dashboard', 'nav_bar_active')
@section('main_content')
    <div class="row">
        <div class="col-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-12">
                            <h5 class="text-center">Welcome {{ auth()->user()->name }}</h5>
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
                                    <tr v-for="(user,key) in users">
                                        <td v-text="key+1"></td>
                                        <td v-text="user.name"></td>
                                        <td v-text="user.email"></td>
                                        <td v-text="user.contact_no"></td>
                                        <td v-text="user.address"></td>
                                        <td v-text="user.status == 1 ? 'ACTIVE' : 'NOT-ACTIVE'"></td>
                                        <td>
                                            <a :href="APPROVE_PATH +'/'+user.id" v-if="user.status == 0"
                                                class="btn btn-sm btn-success"><i class="fa-solid fa-thumbs-up"></i>
                                                Approve</a>
                                            <a :href="DISAPPROVE_PATH +'/'+user.id" v-if="user.status == 1"
                                                class="btn btn-sm btn-danger"><i class="fa-solid fa-thumbs-down"></i>
                                               Disapprove</a>
                                        </td>
                                    </tr>
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
            data: {
                APPROVE_PATH: @json(url('admin/approve-user/')),
                DISAPPROVE_PATH: @json(url('admin/disapprove-user/')),
                users: @json($users)
            },
            methods: {

            },
            mounted() {
                let vm = this;
            }
        });
    </script>
@endsection
@endsection
