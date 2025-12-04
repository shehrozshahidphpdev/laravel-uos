@props(['settings'])
<x-user.layouts.master :settings="$settings" title="Home - Merit List">
  <main class="main">
    <x-user.hero-banner :banner="$banner" navigation="Merit List" />
    <section class="time-table">
      <div class="container">
        <h2 class="title">Merit Lists 2025-29</h2>
        <div class="table-container">
          <table class="table">
            <thead class="table-head">
              <tr>
                <th>Program</th>
                <th>1st Merit List</th>
                <th>2nd Merit List</th>
                <th>3nd Merit List</th>
                <th>4nd Merit List</th>
                <th>5nd Merit List</th>
                <th>6nd Merit List</th>
                <th>7nd Merit List</th>
                <th>8nd Merit List</th>
                <th>9nd Merit List</th>
                <th>10th Merit List</th>
              </tr>
            </thead>
            <tbody class="body">
              @forelse($merits as $merit)
                <tr class="odd">
                  <td class="program">{{ $merit->program_name }} ({{ $merit->shift }})</td>
                  <td>
                    @if($merit->first_merit_list)
                      <a target="_blank"
                        href="{{ asset('storage/admin/uploads/merit/' . $merit->first_merit_list) }}">Download Pdf</a>
                    @endif
                  </td>

                  <td>
                    @if($merit->second_merit_list)
                      <a target="_blank"
                        href="{{ asset('storage/admin/uploads/merit/' . $merit->second_merit_list) }}">Download Pdf</a>
                    @endif
                  </td>

                  <td>
                    @if($merit->third_merit_list)
                      <a target="_blank"
                        href="{{ asset('storage/admin/uploads/merit/' . $merit->third_merit_list) }}">Download Pdf</a>
                    @endif
                  </td>

                  <td>
                    @if($merit->fourth_merit_list)
                      <a target="_blank"
                        href="{{ asset('storage/admin/uploads/merit/' . $merit->fourth_merit_list) }}">Download Pdf</a>
                    @endif
                  </td>

                  <td>
                    @if($merit->fifth_merit_list)
                      <a target="_blank"
                        href="{{ asset('storage/admin/uploads/merit/' . $merit->fifth_merit_list) }}">Download Pdf</a>
                    @endif
                  </td>

                  <td>
                    @if($merit->sixth_merit_list)
                      <a target="_blank"
                        href="{{ asset('storage/admin/uploads/merit/' . $merit->sixth_merit_list) }}">Download Pdf</a>
                    @endif
                  </td>

                  <td>
                    @if($merit->seventh_merit_list)
                      <a target="_blank"
                        href="{{ asset('storage/admin/uploads/merit/' . $merit->seventh_merit_list) }}">Download Pdf</a>
                    @endif
                  </td>

                  <td>
                    @if($merit->eighth_merit_list)
                      <a target="_blank"
                        href="{{ asset('storage/admin/uploads/merit/' . $merit->eighth_merit_list) }}">Download Pdf</a>
                    @endif
                  </td>

                  <td>
                    @if($merit->ninth_merit_list)
                      <a target="_blank"
                        href="{{ asset('storage/admin/uploads/merit/' . $merit->nineth_merit_list) }}">Download Pdf</a>
                    @endif
                  </td>

                  <td>
                    @if($merit->tenth_merit_list)
                      <a target="_blank"
                        href="{{ asset('storage/admin/uploads/merit/' . $merit->tenth_merit_list) }}">Download Pdf</a>
                    @endif
                  </td>

                </tr>
              @empty
                <tr>
                  <td class="text-center" colspan="100%">
                    <h2>No Data Found.</h2>
                  </td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </section>
  </main>
</x-user.layouts.master>
