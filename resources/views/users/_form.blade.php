<div class="card card-primary">
    <div class="card-body">
        <div class="form-group">
            <label for="name">Ime</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name ?? '') }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email adresa</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email ?? '') }}" required>
        </div>

        @if (!isset($user))
            <div class="form-group">
                <label for="password">Lozinka</label>
                <input type="password" name="password" class="form-control" required>
            </div>
        @endif

        <div class="form-group">
            <label for="role_id">Uloga</label>
            <select name="role_id" class="form-control" required>
                <option value="1" {{ old('role_id', $user->role_id ?? '') == 1 ? 'selected' : '' }}>Admin</option>
                <option value="2" {{ old('role_id', $user->role_id ?? '') == 2 ? 'selected' : '' }}>Moderator</option>
            </select>
        </div>
    </div>

    <div class="card-footer text-right">
        <button type="submit" class="btn btn-success">
            <i class="fas fa-save"></i> Sačuvaj
        </button>
    </div>
</div>
