@if ($paginator->hasPages())
    <nav style="display:flex;gap:4px;align-items:center;flex-wrap:wrap;">

        {{-- Previous --}}
        @if ($paginator->onFirstPage())
            <span style="display:inline-flex;align-items:center;justify-content:center;min-width:36px;height:36px;padding:0 12px;border-radius:8px;font-size:0.85rem;font-weight:500;border:1px solid rgba(255,255,255,0.15);color:rgba(161,161,170,0.5);background:#09090b;cursor:not-allowed;">
                <i class="bi bi-chevron-left"></i>
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" style="display:inline-flex;align-items:center;justify-content:center;min-width:36px;height:36px;padding:0 12px;border-radius:8px;font-size:0.85rem;font-weight:500;border:1px solid rgba(255,255,255,0.15);color:#a1a1aa;background:#09090b;text-decoration:none;transition:all 0.3s;" onmouseover="this.style.borderColor='#ffffff';this.style.color='#000';this.style.background='#ffffff';" onmouseout="this.style.borderColor='rgba(255,255,255,0.15)';this.style.color='#a1a1aa';this.style.background='#09090b';">
                <i class="bi bi-chevron-left"></i>
            </a>
        @endif

        {{-- Pages --}}
        @foreach ($elements as $element)
            @if (is_string($element))
                <span style="display:inline-flex;align-items:center;justify-content:center;min-width:36px;height:36px;border-radius:8px;font-size:0.85rem;color:#71717a;">{{ $element }}</span>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span style="display:inline-flex;align-items:center;justify-content:center;min-width:36px;height:36px;border-radius:8px;font-size:0.85rem;font-weight:700;background:linear-gradient(135deg,#ffffff,#d4d4d8);color:#000;border:1px solid #ffffff;box-shadow:0 4px 12px rgba(255,255,255,0.15);">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" style="display:inline-flex;align-items:center;justify-content:center;min-width:36px;height:36px;border-radius:8px;font-size:0.85rem;font-weight:500;border:1px solid rgba(255,255,255,0.15);color:#a1a1aa;background:#09090b;text-decoration:none;transition:all 0.3s;" onmouseover="this.style.borderColor='#ffffff';this.style.color='#000';this.style.background='#ffffff';" onmouseout="this.style.borderColor='rgba(255,255,255,0.15)';this.style.color='#a1a1aa';this.style.background='#09090b';">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" style="display:inline-flex;align-items:center;justify-content:center;min-width:36px;height:36px;padding:0 12px;border-radius:8px;font-size:0.85rem;font-weight:500;border:1px solid rgba(255,255,255,0.15);color:#a1a1aa;background:#09090b;text-decoration:none;transition:all 0.3s;" onmouseover="this.style.borderColor='#ffffff';this.style.color='#000';this.style.background='#ffffff';" onmouseout="this.style.borderColor='rgba(255,255,255,0.15)';this.style.color='#a1a1aa';this.style.background='#09090b';">
                <i class="bi bi-chevron-right"></i>
            </a>
        @else
            <span style="display:inline-flex;align-items:center;justify-content:center;min-width:36px;height:36px;padding:0 12px;border-radius:8px;font-size:0.85rem;font-weight:500;border:1px solid rgba(255,255,255,0.15);color:rgba(161,161,170,0.5);background:#09090b;cursor:not-allowed;">
                <i class="bi bi-chevron-right"></i>
            </span>
        @endif

    </nav>
@endif
