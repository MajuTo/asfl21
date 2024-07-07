<form method="POST" action="{{ $action }}" style="display: inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="{{ $btnClass ?? 'btn text-bg-danger badge eraser' }}">{{ $btlLabel ?? 'Supprimer' }}</button>
</form>
