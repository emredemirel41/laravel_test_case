<template>
    <nav class="navbar navbar-expand-lg bg-dark " data-bs-theme="dark"  id="nav">
        <div class="container-fluid">
            <router-link class="navbar-brand" to="/">CaseStudy</router-link>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <router-link class="nav-link" to="/authors">Authors</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" to="/addbook">Add Book</router-link>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <li class="nav-item">
                       <a href=""></a>
                    </li>
                    <router-link class="btn btn-outline-success" to="/">Login</router-link>
                </form>
            </div>
        </div>
    </nav>
<router-view /></template>