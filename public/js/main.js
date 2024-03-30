$(document).on('click','.add-hobby',function(e){
    e.preventDefault();
    var hobbyDiv = `<div class="name-item">
    <input type="text" name="hobby[]" placeholder="Enter Hobby" />
    <button class="btn btn-danger remove-hobby">Remove Hobby</button>

</div>`;
    $(this).parents('.hobby').append(hobbyDiv);
});
$(document).on('click','.remove-hobby',function(e){
    e.preventDefault();
    $(this).parents('.name-item').remove();
});
$(document).on('click','.add-family-member',function(e){
    e.preventDefault();
    var memberCount = $('.family-member').data('member-count');
    memberCount = memberCount + 1;
    var i = memberCount + 'a';
    var j = memberCount + 'b';
    var familyMember = `<div class="memberBox">
    <button class="float-right rounded-circle close remove-family-member">
        <i class="fa fa-times" aria-hidden="true"></i>
    </button>
    <div class="item">
        <p>Name ${memberCount}</p>
        <div class="name-item">
            <input type="text" name="fmfname[]" placeholder="First Name" />
            <input type="text" name="fmlname[]" placeholder="Last Name" />
        </div>
    </div>

    <div class="item">
        <p>Birth Date</p>
        <input type="date" name="fmbdate[]" />
        <i class="fas fa-calendar-alt"></i>
    </div>
    <div class="item">
        <p>Marital Status</p>
        <div class="switch-field">
            <input type="radio" id="radio-${i}" name="fmfmarital_sts[${memberCount}]" value="yes" checked/>
            <label for="radio-${i}">Married</label>
            <input type="radio" id="radio-${j}" name="fmfmarital_sts[${memberCount}]" value="no" />
            <label for="radio-${j}">Un-Married</label>
        </div>
    </div>
    
    <div class="item">
        <p>Education</p>
        <input type="text" name="education[]" placeholder="Education" />
    </div>
</div>`;
    $('.family-member').append(familyMember);
    $('.family-member').data('member-count',memberCount);
});
$(document).on('click','.remove-family-member',function(e){
    e.preventDefault();
    $(this).parents('.memberBox').remove();
    var memberCount = $('.family-member').data('member-count');
    memberCount = memberCount - 1;
    $('.family-member').data('member-count',memberCount);
});

$(document).on('click','.clickable-row',function(e){
    window.location = $(this).data("href");
});