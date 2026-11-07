@props(['label', 'value', 'note' => null])

<div class="card stat">
    <span>{{ $label }}</span>
    <strong>{{ $value }}</strong>
    @if ($note)
        <span>{{ $note }}</span>
    @endif
</div>
