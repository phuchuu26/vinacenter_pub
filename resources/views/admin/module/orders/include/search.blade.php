<div class="row mt-3">
    <div class="col-lg-12">
        <table>
            <tr>
                <form action="" method="GET">
                    <td>
                        <div class="input-group mb-3 p-r-2">
                            <input type="text" class="form-control" placeholder="Search" name="keyword"
                                   value="{{ Request::get('keyword') }}">
                            <div class="input-group-append">
                                <button class="btn btn-success" type="submit"><i class="fa fa-search"
                                                                                 aria-hidden="true"></i> Tìm
                                </button>
                            </div>
                        </div>
                    </td>
                </form>
                <form action="" method="GET">
                    <td>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Từ</span>
                            </div>
                            <input type="date" class="form-control" name="from" id="from"
                                   value="{{ Request::get('from') }}">
                        </div>
                    </td>
                    <td>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Đến</span>
                            </div>
                            <input type="date" class="form-control" name="to" id="to" value="{{ Request::get('to') }}">
                        </div>
                    </td>
                    @if(Auth::user()->role == 1)
                    <td>
                        <div class="form-group">
                            <select class="form-control" id="username" name="username">
                                @foreach($users as $user)
                                    <option value="{{ $user->username }}"
                                            @if(Request::get('username') == $user->username)
                                                selected
                                            @endif
                                    >{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </td>
                    @endif
                    <td>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-filter" aria-hidden="true"></i> Lọc
                            </button>
                        </div>
                    </td>
                </form>
            </tr>
        </table>
    </div>
</div>
