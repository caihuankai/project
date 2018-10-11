<script>




    function loadClick(){
        $('.handle-assistant').click(function (){
            var e = $(this),
                type = e.data('type'),
                userId = e.data('user-id'),
                teacherId = e.data('teacher-id');
            
            requestAjax({
                type: type,
                userId: userId,
                teacherIds: [teacherId]
            }, {
                url: '<{:url("handleAssistant")}>',
                localSuccess: function (){
                    adminTableRefresh();
                }
            })
            
        });
    }


    window['adminTableConfig'] = {
        onLoadSuccess: loadClick,
        onToggle: loadClick
    };
    
    
    
    
    $(function (){
        $('#admin-table-toolbar-assistant-add, #admin-table-toolbar-assistant-del').click(function () {
            var e = $(this),
                ids = [];

            adminTableGetSelections(function (data){
                ids.push(data['id']);
            });

            if (ids.length > 0) {
                requestAjax({
                    userId: e.data('user-id'),
                    teacherIds: ids,
                    type: e.data('type')
                }, {
                    url: "<{:url('handleAssistant')}>",
                    localSuccess: function (){
                        adminTableRefresh();
                    }
                });
            }
        });
        
        

    });
    
    
    
</script>



