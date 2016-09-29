#include <stdlib.h>
#include <stdio.h>
#include "linked-list.h"
#include "lib_includes.h"

LINKED_LIST *LinkedListAlloc(pCmpFcn Cmp)
{
    LINKED_LIST *ll = (LINKED_LIST*)paj_alloc(sizeof(LINKED_LIST));
    ll->first = ll->last = NULL;
    ll->n = 0;
    ll->Cmp = Cmp;
    return ll;
}

/* LinkedListReset: set number of items to zero for re-use.
*/
void LinkedListReset(LINKED_LIST *ll)
{
    LINKED_LIST_NODE *node = ll->first;
    while(node != NULL)
    {
        LINKED_LIST_NODE *prev = node;
        node = node->next;
        free(prev);
    }

    ll->first = ll->last = NULL;
    ll->n = 0;
}

int LinkedListSize(LINKED_LIST *ll)
{
    return ll->n;
}

/* LinkedListFree: free a list and all it's storage.  It does not have to be
** empty.
*/
void LinkedListFree(LINKED_LIST *ll)
{
    LinkedListReset(ll);
    free(ll);
}

/*
** LinkedListPrepend: insert a new element at the front of the list.
*/
foint LinkedListPrepend(LINKED_LIST *ll, foint newEntry)
{
    LINKED_LIST_NODE *newNode = (LINKED_LIST_NODE*)paj_alloc(sizeof(LINKED_LIST_NODE));
    newNode->data = newEntry;
    newNode->next = ll->first;
    ll->first = newNode;
    if(ll->last == NULL)
        ll->last = newNode;
    ll->n++;
    return newEntry;
}

/*
** LinkedListAppend: insert a new element at the end of the list.
*/
foint LinkedListAppend(LINKED_LIST *ll, foint newEntry)
{
    LINKED_LIST_NODE *newNode = (LINKED_LIST_NODE*)paj_alloc(sizeof(LINKED_LIST_NODE));
    newNode->data = newEntry;
    newNode->next = NULL;
    if(ll->first == NULL)
    {
        trapAssert(ll->n == 0 && ll->last == NULL);
        ll->first = newNode;
    }
    else
    {
        trapAssert(ll->n > 0);
        ll->last->next = newNode;
    }
    ll->last = newNode;
    ll->n++;
    return newEntry;
}


/* LinkedListInsert: return new value after inserting.
*/
foint LinkedListInsert(LINKED_LIST *ll, foint newEntry)
{
    LINKED_LIST_NODE *prev = NULL, *curr = ll->first;

    trapAssert(ll->Cmp != NULL);

    /* if we're first... */
    if(ll->first == NULL || ll->Cmp(newEntry, ll->first->data) < 0)
        return LinkedListPrepend(ll, newEntry);

    /* we should be last */
    if(ll->Cmp(newEntry, ll->last->data) >= 0)
        return LinkedListAppend(ll, newEntry);

    /* else ... */
    while(curr != NULL && ll->Cmp(newEntry, curr->data) >= 0)
    {
        prev = curr;
        curr = curr->next;
    }

    trapAssert(curr != NULL); /* if we're last, it should've been done above! */

    prev->next = (LINKED_LIST_NODE*)paj_alloc(sizeof(LINKED_LIST_NODE));
    prev->next->data = newEntry;
    prev->next->next = curr;
    ll->n++;

    return newEntry;
}


/* peek at the top of the list without getting it */
foint LinkedListPeek(LINKED_LIST *ll)
{
    if(ll->n == 0)
    {
        trapAssert(ll->first == NULL && ll->last == NULL);
        return (foint)0;        /* too keep gcc quiet */
    }
    return ll->first->data;
}

/* This deletes the top entry and returns its value.  If the list is
** empty, you can die with an assertion failure.
*/
foint LinkedListNext(LINKED_LIST *ll)
{
    foint data;
    LINKED_LIST_NODE *newFirst;
    if(ll->n == 0)
    {
        trapAssert(ll->first == NULL && ll->last == NULL);
    }
    data = ll->first->data;
    newFirst = ll->first->next;
    free(ll->first);
    ll->first = newFirst;
    if(ll->first == NULL)
	ll->last = NULL;
    ll->n--;
    return data;
}

LINKED_LIST_NODE *LinkedListNodeNext(LINKED_LIST_NODE *lln)
{
	if (lln == NULL)	
	{
		return NULL;
	}
	return (lln->next);
}

foint LinkedListNodeData(LINKED_LIST_NODE *lln)
{
	if (lln != NULL)
	{
		return (lln->data);
	}
	return NULL;
}
LINKED_LIST_NODE *LinkedListNodePeek(LINKED_LIST *ll)
{
    if((ll == NULL) ||(ll->n == 0))
    {
	return NULL;
    }
    return ll->first;
}
/*
** Copies one link list to the other
*/
void LinkedListCopy(LINKED_LIST *lt, LINKED_LIST *lf)
{
	LINKED_LIST_NODE *curr;

	/* go through the list from (lf) and put each item in list to (lt) */
	for (curr = lf->first; curr != NULL; curr = curr->next)
	{
		LinkedListAppend(lt, curr->data);
	}
}
/*
** Copies one link list to the other item by item if the item from is not 
already in list to
*/
void LinkedListCopyIfNotExistInTo(LINKED_LIST *lt, LINKED_LIST *lf)
{
	LINKED_LIST_NODE *lf_traverse;
	LINKED_LIST_NODE *lt_traverse;
	LINKED_LIST_NODE *lt_original_head = lt->first;
	int found;

	/* go through the list from (lf) and put each item in list to (lt) */
	for (lf_traverse = lf->first; lf_traverse != NULL; lf_traverse = lf_traverse->next)
	{
		found = FALSE;

		/* go through the list and if find then state that you found */
		for (lt_traverse = lt_original_head; lt_traverse != NULL; lt_traverse = lt_traverse->next)
		{
			if (lf_traverse->data == lt_traverse->data)
			{
				found = TRUE;
				break;
			}
		}
		/* if you don't find, add this data to the front so we don't
		 * compare */
		if (found != TRUE)
		{
			LinkedListPrepend(lt, lf_traverse->data);
		}
	}
}
/*
 * paj - Inserts a void type object if void doesn't appear in the list
*/
int  LinkedListAppendVoidIfNotExist(LINKED_LIST *ll, foint to_add)
{
	LINKED_LIST_NODE *ll_traverse;
	int found = FALSE;

	/* go through the list from (lf) and put each item in list to (lt) */
	for (ll_traverse = ll->first; ll_traverse != NULL; ll_traverse = ll_traverse->next)
	{
		found = FALSE;

		if (ll_traverse->data == to_add)
		{
			found = TRUE;
			break;
		}
		
	}
	/* if you don't find, add this data to the front so we don't
	 * compare */
	if (found != TRUE)
	{
		LinkedListAppend(ll, to_add);
	}
	return found;
}
/* LinkedListDeleteVoid: searches for to_remove and if finds, removes */
int LinkedListRemoveVoid(LINKED_LIST *ll, foint to_remove)
{
	LINKED_LIST_NODE *prev = NULL, *curr = ll->first;

	/* if we're first... */
	if(ll->first == NULL)
	{
		return FALSE;
	}
	if(curr == to_remove)
	{
		LinkedListNext(ll);
		return TRUE;
	}
	/* else ... */
	while((curr != NULL) && (curr != to_remove))
	{
		prev = curr;
		curr = curr->next;
	}

	/* end of the list...not found */
	if (curr == NULL)
	{
		return FALSE;
	}

	/* set the two in the middle to point properly */
	prev->next = curr->next;
	/* remove curr */
    free(curr);

	if (curr == ll->last)
	{
		ll->last = prev;
	}

	ll->n--;

	return TRUE;
}
