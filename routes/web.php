<?php


use App\Models\EmissionCarte;

use App\Models\AcquisitionCarte;
use App\Models\FraudeChequeCarte;
use App\Models\IncidentChequeCarte;
use App\Models\IncidentPaiementCarte;
use App\Models\IncidentPaiementCheque;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AcquisitionCarteController;
use App\Http\Controllers\EmissionCarteController;
use App\Http\Controllers\FraudeChequeCarteController;
use App\Http\Controllers\IncidentChequeCarteController;
use App\Http\Controllers\IncidentPaiementCarteController;
use App\Http\Controllers\IncidentPaiementChequeController;
use App\Http\Controllers\ReclamationChequeCarteController;
use App\Http\Controllers\TarificationChequeCarteController;
use App\Http\Controllers\TypologieChequeController;
use App\Http\Controllers\UtilisationCarteController;
use App\Http\Controllers\UtilisationChequeController;
use App\Http\Controllers\AnnuaireStraController;
use App\Http\Controllers\RisqueStraController;
use App\Http\Controllers\IncidentStraController;
use App\Http\Controllers\DeclarationXmlController;
use App\Http\Controllers\EcosystemeController;
use App\Http\Controllers\FraudeStraController;
use App\Http\Controllers\OperationStraController;
use App\Http\Controllers\ReclamationStraController;
use App\Http\Controllers\DashboardController;


use Illuminate\Support\Facades\Route;




Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }
    return view('welcome');
});

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');



// Route::get('/dashboard1', function () {
//     return view('dashboard1', [
//         'totalAcquisition' => AcquisitionCarte::count(),
//         'totalEmission' => EmissionCarte::count(),
//         'totalFraude' => FraudeChequeCarte::count(),
//         'totalIncident' => IncidentChequeCarte::count(),
//         'totalIncidentPaiement' => IncidentPaiementCarte::count(),
//         'totalIncidentPaiementCheque' => IncidentPaiementCheque::count(),
//     ]);
// })->middleware(['auth'])->name('dashboard1');



// Route::get('/dashboard', function () {
//     return view('dashboard', [
//         'totalAcquisition' => AcquisitionCarte::count(),
//         'totalEmission' => EmissionCarte::count(),
//         'totalFraude' => FraudeChequeCarte::count(),
//         'totalIncident' => IncidentChequeCarte::count(),
//         'totalIncidentPaiement' => IncidentPaiementCarte::count(),
//         'totalIncidentPaiementCheque' => IncidentPaiementCheque::count(),
//     ]);
// })->middleware(['auth'])->name('dashboard');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/acquisition/create', [AcquisitionCarteController::class, 'create'])->name('acquisition.create');
    Route::post('/acquisition/store', [AcquisitionCarteController::class, 'store'])->name('acquisition.store');
    Route::get('/acquisition', [AcquisitionCarteController::class, 'index'])->name('acquisition.index');
    Route::post('/acquisition', [AcquisitionCarteController::class, 'index'])->name('acquisition.index');
});

Route::middleware(['auth'])->group(function () {
    // Route::get('/emission-cartes/create', [EmissionCarteController::class, 'create'])->name('emission-cartes.create');
    // Route::post('/emission-cartes/store', [EmissionCarteController::class, 'store'])->name('emission-cartes.store');
    // // Route::resource('emission-cartes', EmissionCarteController::class)->only(['create', 'store']);
    // Route::get('/emission-cartes', [EmissionCarteController::class, 'index'])->name('emission-cartes.index');
    // Route::post('/emission-cartes', [EmissionCarteController::class, 'index'])->name('emission-cartes.index');

    Route::get('/emission-cartes/create', [EmissionCarteController::class, 'create'])->name('emission-cartes.create');
    Route::post('/emission-cartes/store', [EmissionCarteController::class, 'store'])->name('emission-cartes.store');
    Route::get('/emission-cartes', [EmissionCarteController::class, 'index'])->name('emission-cartes.index');
    Route::post('/emission-cartes', [EmissionCarteController::class, 'index'])->name('emission-cartes.index');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/fraudechequecarte/create', [FraudeChequeCarteController::class, 'create'])->name('fraudechequecarte.create');
    Route::post('/fraudechequecarte/store', [FraudeChequeCarteController::class, 'store'])->name('fraudechequecarte.store');
    Route::get('/fraudechequecarte', [FraudeChequeCarteController::class, 'index'])->name('fraudechequecarte.index');
    Route::post('/fraudechequecarte', [FraudeChequeCarteController::class, 'index'])->name('fraudechequecarte.index');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/incidentchequecarte/create', [IncidentChequeCarteController::class, 'create'])->name('incidentchequecarte.create');
    Route::post('/incidentchequecarte/store', [IncidentChequeCarteController::class, 'store'])->name('incidentchequecarte.store');
    Route::get('/incidentchequecarte', [IncidentChequeCarteController::class, 'index'])->name('incidentchequecarte.index');
    Route::post('/incidentchequecarte', [IncidentChequeCarteController::class, 'index'])->name('incidentchequecarte.index');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/incidentpaiementcarte/create', [IncidentPaiementCarteController::class, 'create'])->name('incidentpaiementcarte.create');
    Route::post('/incidentpaiementcarte/store', [IncidentPaiementCarteController::class, 'store'])->name('incidentpaiementcarte.store');
    Route::get('/incidentpaiementcarte', [IncidentPaiementCarteController::class, 'index'])->name('incidentpaiementcarte.index');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/incidentpaiementcheque/create', [IncidentPaiementChequeController::class, 'create'])->name('incidentpaiementcheque.create');
    Route::post('/incidentpaiementcheque/store', [IncidentPaiementChequeController::class, 'store'])->name('incidentpaiementcheque.store');
    Route::get('/incidentpaiementcheque', [IncidentPaiementChequeController::class, 'index'])->name('incidentpaiementcheque.index');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/reclamationchequecarte/create', [ReclamationChequeCarteController::class, 'create'])->name('reclamationchequecarte.create');
    Route::post('/reclamationchequecarte/store', [ReclamationChequeCarteController::class, 'store'])->name('reclamationchequecarte.store');
    Route::get('/reclamationchequecarte', [ReclamationChequeCarteController::class, 'index'])->name('reclamationchequecarte.index');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/tarificationchequecarte/create', [TarificationChequeCarteController::class, 'create'])->name('tarificationchequecarte.create');
    Route::post('/tarificationchequecarte/store', [TarificationChequeCarteController::class, 'store'])->name('tarificationchequecarte.store');
    Route::get('/tarificationchequecarte', [TarificationChequeCarteController::class, 'index'])->name('tarificationchequecarte.index');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/typologiecheque/create', [TypologieChequeController::class, 'create'])->name('typologiecheque.create');
    Route::post('/typologiecheque/store', [TypologieChequeController::class, 'store'])->name('typologiecheque.store');
    Route::get('/typologiecheque', [TypologieChequeController::class, 'index'])->name('typologiecheque.index');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/utilisationcarte/create', [UtilisationCarteController::class, 'create'])->name('utilisationcarte.create');
    Route::post('/utilisationcarte/store', [UtilisationCarteController::class, 'store'])->name('utilisationcarte.store');
    Route::get('/utilisationcarte', [UtilisationCarteController::class, 'index'])->name('utilisationcarte.index');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/utilisationcheque/create', [UtilisationChequeController::class, 'create'])->name('utilisationcheque.create');
    Route::post('/utilisationcheque/store', [UtilisationChequeController::class, 'store'])->name('utilisationcheque.store');
    Route::get('/utilisationcheque', [UtilisationChequeController::class, 'index'])->name('utilisationcheque.index');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/annuairestra/create', [AnnuaireStraController::class, 'create'])->name('annuairestra.create');
    Route::post('/annuairestra/store', [AnnuaireStraController::class, 'store'])->name('annuairestra.store');
    Route::get('/annuairestra', [AnnuaireStraController::class, 'index'])->name('annuairestra.index');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/risquestra/create', [RisqueStraController::class, 'create'])->name('risquestra.create');
    Route::post('/risquestra/store', [RisqueStraController::class, 'store'])->name('risquestra.store');
    Route::get('/risquestra', [RisqueStraController::class, 'index'])->name('risquestra.index');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/incidentstra/create', [IncidentStraController::class, 'create'])->name('incidentstra.create');
    Route::post('/incidentstra/store', [IncidentStraController::class, 'store'])->name('incidentstra.store');
    Route::get('/incidentstra', [IncidentStraController::class, 'index'])->name('incidentstra.index');
});


Route::get('/declaration/xml', [DeclarationXmlController::class, 'index'])->name('declaration.xml.index');
Route::post('/declaration/xml/preview', [DeclarationXmlController::class, 'preview'])->name('declaration.xml.preview');
Route::post('/declaration/xml/generate', [DeclarationXmlController::class, 'generate'])->name('declaration.xml.generate');


Route::middleware(['auth'])->group(function () {
    Route::get('/ecosysteme/create', [EcosystemeController::class, 'create'])->name('ecosysteme.create');
    Route::post('/ecosysteme/store', [EcosystemeController::class, 'store'])->name('ecosysteme.store');
    Route::get('/ecosysteme', [EcosystemeController::class, 'index'])->name('ecosysteme.index');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/fraudestra/create', [FraudeStraController::class, 'create'])->name('fraudestra.create');
    Route::post('/fraudestra/store', [FraudeStraController::class, 'store'])->name('fraudestra.store');
    Route::get('/fraudestra', [FraudeStraController::class, 'index'])->name('fraudestra.index');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/operationstra/create', [OperationStraController::class, 'create'])->name('operationstra.create');
    Route::post('/operationstra/store', [OperationStraController::class, 'store'])->name('operationstra.store');
    Route::get('/operationstra', [OperationStraController::class, 'index'])->name('operationstra.index');
});


Route::get('/reclamationstra/create', [ReclamationStraController::class, 'create'])->name('reclamationstra.create');
Route::post('/reclamationstra/store', [ReclamationStraController::class, 'store'])->name('reclamationstra.store');
Route::get('/reclamationstra', [ReclamationStraController::class, 'index'])->name('reclamationstra.index');



require __DIR__ . '/auth.php';
