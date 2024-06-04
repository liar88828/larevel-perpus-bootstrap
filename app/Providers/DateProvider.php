<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class DateProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Blade::directive('formatDate', function ($expression) {
            return "<?php echo formatDate($expression); ?>";
        });

    }

    public static function formatDate($dateString)
    {
        $date = Carbon::parse($dateString);
        $dayOfWeek = $date->translatedFormat('l');
        $day = $date->day;
        $month = $date->translatedFormat('F');
        $year = $date->year;

        $monthNames = [
            'January'   => 'januari',
            'February'  => 'februari',
            'March'     => 'maret',
            'April'     => 'april',
            'May'       => 'mei',
            'June'      => 'juni',
            'July'      => 'juli',
            'August'    => 'agustus',
            'September' => 'september',
            'October'   => 'oktober',
            'November'  => 'november',
            'December'  => 'desember',
        ];

        $month = $monthNames[$month];

        return "$dayOfWeek, $day $month $year";
    }
}