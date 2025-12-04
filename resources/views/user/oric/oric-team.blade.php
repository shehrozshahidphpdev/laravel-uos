@props(['settings'])
<x-user.layouts.master :settings="$settings" title="home oric team">
  <main class="main">
    <x-user.hero-banner :banner="$banner" navigation="Directorate" />
    <section class="intro">
      <div class="container">
        <div class="hero-content">
          <section class="oric-team">
            <h1 class="primary-title jost">{{ strtoupper($tableTitle->title) }}</h1>
            <div class="table-container">
              <table class="table">
                <thead class="table-head">
                  <tr>
                    @foreach($tableColumns->columns as $column)
                      <th><b>{{ $column }}</b></th>
                    @endforeach
                  </tr>
                </thead>
                <tbody>
                  @foreach ($tableRows as $data)
                    <tr class="odd">
                      @foreach ($data->rows as $row)
                        <td>
                          <ul class="clean-list">
                            <li>{{ $row }}</li>
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