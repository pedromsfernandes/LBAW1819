<tr data-id="{{$user->id}}">
    <th scope="row">{{$user->username}}</th>
    <td>
        @if($user->is_enabled)
            Enabled
        @else
            Disabled
        @endif
    </td>
    <td>
    @if($user->is_enabled && $user->is_staff_member)
        <button type="button" class="btn btn-danger btn-sm updateMember" data-id={{$user->id}} data-toggle="modal" data-target="#confirmStaffDisable">
            <i class="fas fa-minus-circle"></i>
            <span class="button-text">Disable</span>
          </button>
    @elseif($user->is_enabled && !$user->is_staff_member)
        <button type="button" class="btn btn-danger btn-sm updateMember" data-id={{$user->id}} data-toggle="modal" data-target="#confirmUserDisable">
            <i class="fas fa-minus-circle"></i>
            <span class="button-text">Disable</span>
          </button>
    @elseif(!$user->is_enabled && $user->is_staff_member)
        <button type="button" class="btn btn-success btn-sm updateMember" data-id={{$user->id}} data-toggle="modal" data-target="#confirmStaffEnable">
            <i class="fas fa-plus-circle"></i>
            <span class="button-text">Enable</span>
        </button>
    @else
        <button type="button" class="btn btn-success btn-sm updateMember" data-id={{$user->id}} data-toggle="modal" data-target="#confirmUserEnable">
            <i class="fas fa-plus-circle"></i>
            <span class="button-text">Enable</span>
        </button>
    @endif
    </td>
  </tr>