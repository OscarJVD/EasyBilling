<div class="content-wrapper">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <section class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row justify-content-center rounded border p-3 mb-1">
                                    <article class="col-md-12 text-center">
                                        <h1 class="mb-0">
                                            Listado de Usuarios
                                        </h1>
                                    </article>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row justify-content-center rounded">
                                    <article class="col-md-12 p-0 m-0">
                                        <table class="table text-center w-100 table-responsive-sm table-hover table-sm table-striped table-bordered mt-2">
                                            <thead>
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Email</th>
                                                    <th>Estado</th>
                                                    <th>Rol</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($users as $user)
                                                <tr>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->status->name }}</td>
                                                    <td>{{ $user->role->name }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </article>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
