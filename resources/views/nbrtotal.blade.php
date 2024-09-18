@extends('layouts.darsboard')



<@section('content')



    <!-- Main Content -->
    <div class="container">


        <div class="row">

            <div class="col-md-6">
                <div class="card text-dark" style="background-color:#f7ec1e;">
                    <div class="card-header">Nombre d'étudiants inscrits</div>
                    <div class="card-body" style="padding: 40px;">
                        <h1>Total des étudiants inscrits : {{ $totalInscrits }}</h1>

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card text-white mb-3" style="background-color: #e5338b;">
                    <div class="card-header">Nombres d'etudiants en stage</div>
                    <div class="card-body" style="padding: 40px;">
                        <h1>Total des étudiants en stage : {{ $totalStages }}</h1>


                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-md-6">
                <div class="card text-white mb-3" style="background-color: #209ed9;">
                    <div class="card-header">Nombre de formateur</div>
                    <div class="card-body " style="padding: 40px;">
                        <h1>Total des formateurs inscrits : {{ $totalFormateurs }}</h1>


                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card text-white mb-3" style="background-color: #1e1e1c;">
                    <div class="card-header">Nombre d'entreprise de stage</div>
                    <div class="card-body" style="padding: 40px;">
                        <h1>Total d'entreprise de stage : {{ $totallieux_stages }}</h1>


                    </div>
                </div>
            </div>

        </div>
    

    </div>

    @endsection