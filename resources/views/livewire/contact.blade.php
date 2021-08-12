<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <h2 class="contact-title">Kontakt</h2>
            <i class="fas fa-phone-volume" aria-hidden="true">+3816412345678</i>
            <ul class="contact-icons">
                <li><a href="#"><i class="fab fa-facebook-square" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fab fa-youtube" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
            </ul>
        </div>

    </div>
    <div class="row">
        <div class="col-12">
            <form wire:submit.prevent="sendEmail()">
                <div class="row align-items-stretch mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input wire:model="name" class="form-control @error('name') is-invalid @enderror"
                                   type="text" placeholder="Ime *"/>
                            @error('name')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </div>
                        <div class="form-group">
                            <input wire:model="email" class="form-control @error('email') is-invalid @enderror" type="email" placeholder="Email *"  />
                            @error('email')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </div>
                        <div class="form-group">
                            <input wire:model="phoneNumber" class="form-control @error('phoneNumber') is-invalid @enderror" type="tel" placeholder="Broj telefona" />
                            @error('phoneNumber')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-textarea">
                            <textarea wire:model="message" class="form-control @error('message') is-invalid @enderror" placeholder="Vaša poruka *" rows="5" ></textarea>
                            @error('message')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <div class="text-success mb-2">{{ session()->get('success') }}</div>
                    <button class="btn contact-button text-uppercase" type="submit">Pošalji</button>
                </div>
            </form>
        </div>
    </div>
</div>

