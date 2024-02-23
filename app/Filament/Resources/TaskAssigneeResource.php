<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TaskAssigneeResource\Pages;
use App\Filament\Resources\TaskAssigneeResource\RelationManagers;
use App\Models\Student;
use App\Models\Task;
use App\Models\TaskAssignee;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TaskAssigneeResource extends Resource
{
    protected static ?string $model = TaskAssignee::class;

    protected static ?string $navigationIcon = 'heroicon-o-list-bullet';

    protected static ?string $navigationLabel = 'Task Assignee';

    protected static ?string $navigationGroup = 'Teacher Manager';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        Select::make('student_id')
                            ->searchable()
                            // ->multiple()
                            ->options(Student::all()->pluck('name', 'id'))
                            ->label('Student'),
                        Select::make('task_id')->relationship('task', 'title'),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('student.name'),
                TextColumn::make('task.title'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTaskAssignees::route('/'),
            'create' => Pages\CreateTaskAssignee::route('/create'),
            'edit' => Pages\EditTaskAssignee::route('/{record}/edit'),
        ];
    }
}
