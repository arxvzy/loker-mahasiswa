<?php

namespace App\Filament\Resources;

use App\Models\Loker;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Repeater;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Filters\SelectFilter;
use App\Filament\Resources\LokerResource\Pages;
use Filament\Tables\Actions\DeleteAction as ActionsDeleteAction;

class LokerResource extends Resource
{
    protected static ?string $model = Loker::class;

    protected static ?string $navigationLabel = 'Kelola Loker';

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_perusahaan')
                    ->required(),
                TextInput::make('posisi')
                    ->required(),
                TextInput::make('deskripsi_perusahaan')
                    ->required(),
                Select::make('pendidikan')
                    ->label('Minimal Pendidikan')
                    ->options([
                        'SMA/SMK' => 'SMA/SMK',
                        'D1-D3' => 'D1-D3',
                        'S1/D4' => 'S1/D4',
                        'Semua Lulusan' => 'Semua Lulusan',
                    ])
                    ->native(false)
                    ->required(),
                Select::make('gender')
                    ->label('Jenis Kelamin')
                    ->options(['Pria' => 'Pria', 'Wanita' => 'Wanita', 'Pria/Wanita' => 'Pria/Wanita'])
                    ->native(false)
                    ->required(),
                Select::make('status_kerja')
                    ->options(['Full Time' => 'Full Time', 'Part Time' => 'Part Time', 'Freelance' => 'Freelance', 'Magang' => 'Magang','Part Time & Full Time' => 'Part Time & Full Time'])
                    ->native(false)
                    ->required(),
                TextInput::make('alamat')
                    ->required(),
                TextInput::make('panduan_daftar')
                    ->required(),
                Select::make('category_id')
                    ->label('Kategori Wilayah')
                    ->relationship('category', 'name')
                    ->native(false)
                    ->required(),
                TextInput::make('email')
                    ->email()
                    ->suffixIcon('heroicon-o-envelope'),
                TextInput::make('telepon')
                    ->tel()
                    ->suffixIcon('heroicon-o-phone'),
                TextInput::make('website')
                    ->url()
                    ->suffixIcon('heroicon-o-globe-alt'),
                Repeater::make('images')
                    ->relationship('images')
                    ->simple(
                        FileUpload::make('image_link')
                            ->label('Image')
                            ->disk('images')
                            ->directory('/')
                            ->visibility('private')
                            ->image()
                            ->previewable(true)
                            ->maxSize(1024)
                            ->fetchFileInformation(false)
                            ->moveFiles()
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                null,
                                '16:9',
                                '4:3',
                                '1:1',
                            ])
                            ->required(),
                    )
                    ->addActionLabel('Tambah Kolom Image'),
                Repeater::make('syarats')
                    ->relationship('syarats')
                    ->simple(
                        TextInput::make('syarat')
                    )
                    ->addActionLabel('Tambah Kolom Syarat'),
                Repeater::make('jobdesks')
                    ->relationship('jobdesks')
                    ->simple(
                        TextInput::make('jobdesk'),
                    )
                    ->addActionLabel('Tambah Kolom Jobdesk'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('index')
                    ->label('No.')
                    ->rowIndex(),
                TextColumn::make('created_at')
                    ->label('Tanggal dibuat')
                    ->dateTime('d-M-Y H:i:s')
                    ->sortable(),
                TextColumn::make('nama_perusahaan')
                    ->label('Perusahaan')
                    ->searchable()
                    ->sortable()
                    ->limit(15),
                TextColumn::make('posisi')
                    ->searchable()
                    ->sortable()
                    ->limit(15),
                TextColumn::make('category.name')
                    ->label('Kategori Wilayah')
                    ->searchable()
                    ->sortable()
                    ->limit(10),
                ImageColumn::make('images.image_link')
                    ->disk('images')
                    ->visibility('private'),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('category_id')
                    ->relationship('category', 'name')
                    ->label('Kategori Wilayah')
                    ->native(false),
            ])
            ->actions([
                EditAction::make(),
                ActionsDeleteAction::make(),
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
            'index' => Pages\ListLokers::route('/'),
            'create' => Pages\CreateLoker::route('/create'),
            'edit' => Pages\EditLoker::route('/{record}/edit'),
        ];
    }
}
