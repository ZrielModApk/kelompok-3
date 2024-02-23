<?php

namespace App\Filament\Resources\TaskAssigneeResource\Pages;

use App\Filament\Resources\TaskAssigneeResource;
use App\Models\Student;
use App\Models\TaskAssignee;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Contracts\HasForms;
use Filament\Resources\Pages\Page;

class FormStudentClass extends Page implements HasForms
{
    protected static string $resource = TaskAssigneeResource::class;

    protected static string $view = 'filament.resources.task-assignee-resource.pages.form-student-class';

    public $students = [];
    public $task = '';

    public function mount(): void
    {
        $this->form->fill();
    }

    public function getFormSchema(): array
    {
        return [
            Card::make()
                ->schema([
                    Select::make('student_id')
                        ->searchable()
                        ->multiple()
                        ->options(Student::all()->pluck('name', 'id'))
                        ->label('Student'),
                    Select::make('task_id')->relationship('task', 'title'),
                ])
                ->columns(2),
        ];
    }

    public function save()
    {
        $students = $this->students;
        $insert = [];

        foreach ($students as $student) {
            array_push($insert, [
                'student_id' => $student,
                'task_id' => $this->task,
            ]);
        }
        TaskAssignee::insert($insert);

        return redirect()->to('admin/task-assignees');
    }
}
