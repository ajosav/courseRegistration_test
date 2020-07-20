@extends('layouts.master')

@section('sidebar')
   
        <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->

        <li class="nav-item">
            <router-link to="/dashboard" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
                Dashboard
                
            </p>
            </router-link>
        </li>
        @can('isAdmin')
        <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-cog green"></i>
            <p>
                Management
                <i class="right fas fa-angle-left"></i>
            </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <router-link to="/users" class="nav-link">
                <i class="fas fa-users nav-icon"></i>
                <p>Users</p>
                </router-link>
            </li>
            <li class="nav-item">
                <router-link to="/courses" class="nav-link">
                <i class="fas fa-book nav-icon"></i>
                <p>Courses</p>
                </router>
            </li>
            </ul>
        </li>
        @endcan

        <li class="nav-item">
            <a href="{{ route('recommendation.index') }}" class="nav-link">
                <i class="fas fa-book nav-icon teal"></i>
                <p>Course Registration</p>
            </a>
        </li>
        <li class="nav-item">
            <router-link to="/profile" class="nav-link">
                <i class="fas fa-user nav-icon orange "></i>
                <p>Profile</p>
            </router-link>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <i class="fas fa-power-off nav-icon red"></i>
                <p>{{ __('Logout') }}</p>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    
    <!-- /.sidebar-menu -->

@stop

@section('content-wrapper')
    <router-view></router-view>
    <vue-progress-bar></vue-progress-bar>
@stop