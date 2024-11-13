<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.create', compact('types', 'technologies'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        // Otteniamo i dati validati
        $validated = $request->validated();

        // Gestiamo l'immagine se è presente
        if ($request->hasFile('image')) {
            // Salviamo l'immagine nella cartella 'projects' all'interno di storage/app/public
            $path = $request->file('image')->store('projects', 'public');
            // Aggiungiamo il percorso dell'immagine ai dati del progetto
            $validated['image'] = $path;
        }

        // Creiamo il progetto con i dati validati (incluso il percorso dell'immagine)
        $project = Project::create($validated);

        // Associazione delle tecnologie al progetto
        if (isset($validated['technologies'])) {
            $project->technologies()->attach($validated['technologies']);
        }

        return redirect()->route('admin.projects.index')->with('success', 'Progetto creato con successo!');
    }



    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        // Otteniamo i dati validati
        $validated = $request->validated();

        // Gestiamo l'immagine se è presente
        if ($request->hasFile('image')) {
            // Se esiste già un'immagine associata al progetto, la rimuoviamo
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }

            // Salviamo la nuova immagine nella cartella 'projects' all'interno di storage/app/public
            $path = $request->file('image')->store('projects', 'public');
            // Aggiungiamo il percorso dell'immagine ai dati del progetto
            $validated['image'] = $path;
        }

        // Aggiorniamo il progetto con i dati validati (incluso il percorso dell'immagine)
        $project->update($validated);

        // Aggiorniamo l'associazione delle tecnologie al progetto
        if (isset($validated['technologies'])) {
            $project->technologies()->sync($validated['technologies']);
        } else {
            $project->technologies()->detach(); // Rimuove tutte le tecnologie se non selezionate
        }

        return redirect()->route('admin.projects.index')->with('success', 'Progetto aggiornato con successo!');
    }






    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Progetto eliminato con successo!');
    }
}
