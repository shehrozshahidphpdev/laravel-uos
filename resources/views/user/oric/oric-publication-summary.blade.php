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
    <section class="intro mt-5">
      <div class="container">
        <div class="hero-content">
          <h1 class="primary-title mb-4">Research Publications</h1>
          <section class="oric-team">
            <h2 class=" jost">{{ $tableTitle->title }}</h2>
            <div class="table-container">
              <table class="table mb-3">
                <thead class="table-head">
                  <tr>
                    @foreach($firstTableColumns->columns as $col)
                      <th><b>{{ $col }}</b></th>
                    @endforeach
                  </tr>
                </thead>
                <tbody>
                  @foreach($firstTableRows as $totalRows)
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
            </div>
            {{-- 2nd table starts here --}}
            <h2 class=" jost">{{ $tableTitle->title }}</h2>

            <div class="table-container">
              <table class="table mb-3">
                <thead class="table-head">
                  <tr>
                    @foreach($secondTableColumns->columns as $col)
                      <th><b>{{ $col }}</b></th>
                    @endforeach
                  </tr>
                </thead>
                <tbody>
                  @foreach($secondTableRows as $totalRows)
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
            </div>
          </section>
        </div>
        <aside class="navigation">
          <ul class="navigation__list">
            <li class="navigation__item"><a href="{{ route('user.oric') }}" class="navigation__link">ORIC</a></li>
            <li class="navigation__item"><a href="{{ route('user.oric-team') }}" class="navigation__link">Oric Team</a>
            </li>
            <li class="navigation__item"><a href="{{ route('user.oric-partner') }}" class="navigation__link">Partner
                Institutes</a></li>
            <li class="navigation__item"><a href="{{route('user.oric-publications')}}"
                class="navigation__link">Publications</a></li>
            <li class="navigation__item"><a href="#" class="navigation__link">Publication Summary</a></li>
          </ul>
        </aside>
      </div>
    </section>
  </main>
</x-user.layouts.master>