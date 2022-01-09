<div>
    <ul>
        @forelse ($historial as $historia)
            <li>
                <small>
                    {{ $historia->created_at->format('d / m / Y h:i') }}
                </small>
                <strong>{{ $historia->titulo }}</strong>
                <p>
                    {{ $historia->descripcion }}
                </p>
            </li>
        @empty
            <li>
                {{ __('Este registro no cuenta con historial') }}
            </li>
        @endforelse
    </ul>
</div>