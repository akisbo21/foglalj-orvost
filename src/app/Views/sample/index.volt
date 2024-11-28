
<input type="text" id="search-input" placeholder="Type to search for a doctor...">

<div id="search-results">
    {% for doctor in doctors %}
    <div class="one-doctor" data-doctor-id="{{ doctor.getId() }}">
        <div><strong>{{ doctor.getName() }}</strong></div>
        <div class="specialty">{{ doctor.getSpeciality() }}</div>
        <div class="clinics">
            {% for clinic in doctor.getClinics() %}
                <div>{{ clinic.getName() }}</div>
            {% endfor %}
        </div>
    </div>
    {% endfor %}
</div>


<script src="js/search.js"></script>
