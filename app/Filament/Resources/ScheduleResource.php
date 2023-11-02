<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ScheduleResource\Pages;
use App\Filament\Resources\ScheduleResource\RelationManagers;
use App\Models\Schedule;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ScheduleResource extends Resource
{
    protected static ?string $model = Schedule::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';
    protected static ?string $navigationGroup = 'System management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\Section::make('')
                ->description('Add schedule')
                ->schema([
                    Select::make('teachers_id')
                    ->relationship(name: 'teachers', titleAttribute: 'first_name')
                    ->native(false),
                    TimePicker::make('time')
                     ->seconds(false)->required(),

                Select::make('strands_id')
                ->relationship(name: 'strands', titleAttribute: 'strands_name')
                ->native(false) ->required()
                ,
                 
                Select::make('sections_id')
                ->relationship(name: 'sections', titleAttribute: 'section_name')->native(false)->required(),

                Select::make('subjects_id')
                ->relationship(name: 'subjects', titleAttribute:'subjects')->native(false)->required(),
              

                Select::make('day')
                 ->options([

                    'Monday' => 'Monday',
                    'Tuesday' => 'Tuesday',
                    'Wednesday' => 'Wednesday',
                    'Thursday' => 'Thursday',
                    'Friday' => 'Friday',
                   
                 ])->native(false)->required()
                ])->columns(2)
                
                
                ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([ 
                 Tables\Columns\TextColumn::make('subjects.subjects')->label('Subjects'),
                 Tables\Columns\TextColumn::make('time')->label('Time'),
                Tables\Columns\TextColumn::make('Day'),
                Tables\Columns\TextColumn::make('sections.section_name')->label('Section'),
                Tables\Columns\TextColumn::make('teachers.first_name')->label('Teacher'),
                Tables\Columns\TextColumn::make('teachers.last_name')->label(''),
                
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ForceDeleteAction::make(),
                Tables\Actions\RestoreAction::make()
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListSchedules::route('/'),
            'create' => Pages\CreateSchedule::route('/create'),
            'edit' => Pages\EditSchedule::route('/{record}/edit'),
        ];
    }    
}
