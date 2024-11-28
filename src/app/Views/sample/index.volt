
<input type="text" id="search-input" placeholder="Type to search for a doctor...">

<div id="search-results">
    {% for doctor in doctors %}
    <div>
        <span><strong>{{ doctor.name }}</strong></span>
        <span class="specialty">{{ doctor.speciality }}</span>
    </div>
    {% endfor %}
</div>


<script src="js/search.js"></script>
