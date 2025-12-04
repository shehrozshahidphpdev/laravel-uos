@props(['settings'])
<x-user.layouts.master :settings="$settings" title="home oric team">
  @push('styles')
    <style>
      .clean-list-item {
        padding: 2rem;
      }
    </style>
  @endpush
  <main class="main">
    <x-user.hero-banner :banner="$banner" navigation="Directorate" />
    <section class="intro">
      <div class="container">
        <div class="hero-content">
          <section class="oric-team">
            <h1 class="primary-title jost">{{ $tableTitle->title }}</h1>
            <div class="table-container">
              <table class="table">
                <thead class="table-head">
                  <tr>
                    @foreach($tableColumns->columns as $col)
                      <th><b>{{ $col }}</b></th>
                    @endforeach
                  </tr>
                </thead>
                <tbody>
                  @foreach($tableRows as $totalRows)
                    <tr class="odd">
                      @foreach ($totalRows->rows as $rowdata)
                        <td>
                          <ul class="clean-list">
                            <li class="clean-list-item">
                              {{ $rowdata }}
                            </li>
                          </ul>
                        </td>
                      @endforeach
                    </tr>
                  @endforeach

                </tbody>
              </table>
              {{-- display show-pagination --}}
              {{ $tableRows->links('pagination::simple-bootstrap-5') }}

          </section>
        </div>
        <aside class="navigation">
          <ul class="navigation__list">
            <li class="navigation__item"><a href="{{route('user.oric')}}" class="navigation__link">ORIC</a></li>
            <li class="navigation__item"><a href="{{ route('user.oric-team') }}" class="navigation__link">Oric Team</a>
            </li>
            <li class="navigation__item"><a href="{{ route('user.oric-partner') }}" class="navigation__link">Partner
                Institutes</a></li>
            <li class="navigation__item"><a href="{{ route('user.oric-publications') }}"
                class="navigation__link">Publications</a></li>
            <li class="navigation__item"><a href="{{ route('user./oric-publication-summary') }}"
                class="navigation__link">Publications Summary</a></li>
          </ul>
        </aside>
      </div>
    </section>
  </main>
</x-user.layouts.master>