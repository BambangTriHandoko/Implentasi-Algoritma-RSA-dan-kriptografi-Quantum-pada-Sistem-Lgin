@extends('layouts/master')

@section('content')
<div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>NIK</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>User Level</th>
                    <th>Option</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $u)
                <tr>
                    <td>{{ $u->nik }}</td>
                    <td>{{ $u->username }}</td>
                    <td>{{ $u->email }}</td>
                    <td>
                        @if ($u->user_level == 1)
                          Super Akun
                        @elseif ($u->user_level == 2)
                          Admin
                        @elseif ($u->user_level == 3)
                          user lokal
                        @elseif ($u->user_level == 4)
                          user asing
                        @endif
                    </td>
                    <td>
                        <a href="/users/edit/{{ $u->nik }}">Edit</a>
                         - 
                        <a href="/users/hapus/{{ $u->nik }}">Hapus</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>NIK</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>User Level</th>
                    <th>Option</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
@endsection
