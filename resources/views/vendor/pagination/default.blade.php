@if ($paginator->hasPages())
    <nav style="display:flex;gap:4px;align-items:center;flex-wrap:wrap;">

        {{-- Previous --}}
        @if ($paginator->onFirstPage())
            <span style="display:inline-flex;align-items:center;justify-content:center;min-width:36px;height:36px;padding:0 12px;border-radius:8px;font-size:0.85rem;font-weight:500;border:1px solid rgba(99,102,241,0.2);color:rgba(100,116,139,0.5);background:#1a1a2e;cursor:not-allowed;">
                <i class="bi bi-chevron-left"></i>
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" style="display:inline-flex;align-items:center;justify-content:center;min-width:36px;height:36px;padding:0 12px;border-radius:8px;font-size:0.85rem;font-weight:500;border:1px solid rgba(99,102,241,0.2);color:#94a3b8;background:#1a1a2e;text-decoration:none;transition:all 0.3s;" onmouseover="this.style.borderColor='#6366f1';this.style.color='#818cf8';this.style.background='rgba(99,102,241,0.1)';" onmouseout="this.style.borderColor='rgba(99,102,241,0.2)';this.style.color='#94a3b8';this.style.background='#1a1a2e';">
                <i class="bi bi-chevron-left"></i>
            </a>
        @endif

        {{-- Pages --}}
        @foreach ($elements as $element)
            @if (is_string($element))
                <span style="display:inline-flex;align-items:center;justify-content:center;min-width:36px;height:36px;border-radius:8px;font-size:0.85rem;color:#64748b;">{{ $element }}</span>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span style="display:inline-flex;align-items:center;justify-content:center;min-width:36px;height:36px;border-radius:8px;font-size:0.85rem;font-weight:700;background:linear-gradient(135deg,#6366f1,#8b5cf6);color:#fff;border:1px solid #6366f1;box-shadow:0 4px 12px rgba(99,102,241,0.35);">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" style="display:inline-flex;align-items:center;justify-content:center;min-width:36px;height:36px;border-radius:8px;font-size:0.85rem;font-weight:500;border:1px solid rgba(99,102,241,0.2);color:#94a3b8;background:#1a1a2e;text-decoration:none;transition:all 0.3s;" onmouseover="this.style.borderColor='#6366f1';this.style.color='#818cf8';this.style.background='rgba(99,102,241,0.1)';" onmouseout="this.style.borderColor='rgba(99,102,241,0.2)';this.style.color='#94a3b8';this.style.background='#1a1a2e';">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" style="display:inline-flex;align-items:center;justify-content:center;min-width:36px;height:36px;padding:0 12px;border-radius:8px;font-size:0.85rem;font-weight:500;border:1px solid rgba(99,102,241,0.2);color:#94a3b8;background:#1a1a2e;text-decoration:none;transition:all 0.3s;" onmouseover="this.style.borderColor='#6366f1';this.style.color='#818cf8';this.style.background='rgba(99,102,241,0.1)';" onmouseout="this.style.borderColor='rgba(99,102,241,0.2)';this.style.color='#94a3b8';this.style.background='#1a1a2e';">
                <i class="bi bi-chevron-right"></i>
            </a>
        @else
            <span style="display:inline-flex;align-items:center;justify-content:center;min-width:36px;height:36px;padding:0 12px;border-radius:8px;font-size:0.85rem;font-weight:500;border:1px solid rgba(99,102,241,0.2);color:rgba(100,116,139,0.5);background:#1a1a2e;cursor:not-allowed;">
                <i class="bi bi-chevron-right"></i>
            </span>
        @endif

    </nav>
@endif
